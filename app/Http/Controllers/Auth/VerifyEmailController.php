<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class VerifyEmailController extends Controller
{
    public function resendVerification(Request $request): JsonResponse
    {
        $data = $request->validate([
            'email' => 'required|email|exists:users,email',
        ]);
        $user = User::where('email', $data['email'])->firstOrFail();
        if ($user->hasVerifiedEmail()) {
            return $this->errorResponse(
                null,
                'Email already verified.',
                400
            );
        }

        $rawToken = Str::random(64);
        $user->verification_token = Hash::make($rawToken);
        $user->verification_token_created_at = now();
        $user->save();

        $verifyUrl = config('app.frontend_url') . "/email-verification?token={$rawToken}&email=" . urlencode($user->email);
        // $mailerService->sendVerificationEmail($user);
        $data = ['email_verification_url' => $verifyUrl];
        return $this->successResponse($data, 'A verification link has been resent to your email.', 201);
    }

    public function verifyEmail(Request $request)
    {
        $data = $request->validate([
            'email' => 'required|email|exists:users,email',
            'token' => ['required', 'string'],
        ]);

        $user = User::where('email', $data['email'])->firstOrFail();

        if ($user->hasVerifiedEmail()) {
            return $this->errorResponse(
                null,
                'Email already verified.',
                400
            );
        }

        // Check token validity (1-hour timeout)
        $tokenCreatedAt = $user->verification_token_created_at;

        if (!$tokenCreatedAt || Carbon::parse($tokenCreatedAt)->diffInMinutes(now()) > 60) {
            return $this->errorResponse(null, 'Verification token expired.', 410);
        }

        // Check token match
        if (!Hash::check($data['token'], $user->verification_token)) {
            return $this->errorResponse(
                null,
                'Invalid verification token.',
                400
            );
        }

        // Mark email as verified
        $user->email_verified_at = now();
        $user->verification_token_created_at = null;
        $user->verification_token = null;
        $user->save();

        return $this->successResponse(
            null,
            'Email verified successfully.',
            200
        );
    }
}
