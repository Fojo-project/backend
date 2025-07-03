<?php

namespace App\Http\Controllers\Auth;

use App\Enums\UserRole;
use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Http\Requests\Auth\RegisterRequest;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Validation\Rules\Password;

class AuthController extends Controller
{
    public function login(LoginRequest $request): JsonResponse
    {
        try {
            $request->authenticate();
            $user = Auth::user();
            $token = $user->createToken($user->email)->plainTextToken;
            $data = ['token' => $token];
            return $this->successResponse($data, 'Logged in successfully', 200);
        } catch (\Exception $ex) {
            return $this->errorResponse(null, $ex->getMessage(), 500);
        }
    }

    public function register(RegisterRequest $request): JsonResponse
    {
        try {
            //code...
            $data = $request->validated();
            $user = User::create([
                ...$data,
                'verification_token' => Hash::make($urlToken = Str::random(64)),
                'verification_token_created_at' => now()
            ]);
            $user->assignRole($data['role'] ?? UserRole::LEARNER->value);
            $request->authenticate();
            $verifyUrl = config('app.frontend_url') . "/email-verification?token={$urlToken}&email=" . urlencode($user->email);
            // $mailerService->sendVerificationEmail($user);
            $token = $user->createToken($user->email)->plainTextToken;
            $data = ['token' => $token, 'email_verification_url' => $verifyUrl];
            return $this->successResponse($data, 'Registration successful. A verification link has been sent to your email.', 201);
        } catch (\Exception $ex) {
            return $this->errorResponse(null, $ex->getMessage(), 500);
        }
    }

    public function resetPassword(Request $request): JsonResponse
    {
        $request->validate([
            'token' => ['required'],
            'email' => ['required', 'email', 'exists:users,email'],
            'password' => [
                'required',
                'confirmed',
                Password::min(8)
                    ->mixedCase()
                    ->letters()
                    ->numbers()
                    ->symbols()
                    ->uncompromised(),
            ],
        ]);
        $status = \Illuminate\Support\Facades\Password::reset(
            $request->only('email', 'token', 'password', 'password_confirmation'),
            function ($user) use ($request) {
                $user->forceFill([
                    'password' => Hash::make($request->password),
                ])->save();
            }
        );
        return $status === \Illuminate\Support\Facades\Password::PASSWORD_RESET
            ? $this->successResponse(NULL, __($status), 201)
            : $this->errorResponse(NULL, __($status), 400);
    }

    public function sendPasswordResetLink(Request $request): JsonResponse
    {
        $request->validate([
            'email' => 'required|email|exists:users,email',
        ]);
        $user = User::where('email', $request->input('email'))->firstOrFail();
        $token = \Illuminate\Support\Facades\Password::createToken($user);
        $frontendUrl = config('app.frontend_url') . "/reset-password?token={$token}&email=" . urlencode($user->email);
        return $this->successResponse(
            $frontendUrl,
            'Password reset link generated.',
        );
    }


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

    public function logout(Request $request): JsonResponse
    {
        $request->user()->currentAccessToken()->delete();
        return $this->successResponse(NULL, 'Logged out successfully', 204);
    }
}
