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
        $data = $request->validated();
        $user = User::create([...$data, 'remember_token' => Hash::make($urlToken = Str::random(64))]);
        $user->assignRole($data['role'] ?? UserRole::LEARNER->value);
        $verifyUrl = config('app.frontend_url') . "/email-verification?token={$urlToken}&email=" . urlencode($user->email);
        // event(new Registered($user));
        // $mailerService->sendVerificationEmail($user);
        $user = $request->authenticate();
        $token = $user->createToken($user->email, [], now()->addMinutes(2))->plainTextToken;
        $data = ['token' => $token, 'email_verification_url' => $verifyUrl];
        return $this->successResponse($data, 'Registration successful. A verification link has been sent to your email.', 201);
    }
}
