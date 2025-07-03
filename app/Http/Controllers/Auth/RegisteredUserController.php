<?php

namespace App\Http\Controllers\Auth;

use App\enums\UserRole;
use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\RegisterRequest;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class RegisteredUserController extends Controller
{
    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(RegisterRequest $request): JsonResponse
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
}
