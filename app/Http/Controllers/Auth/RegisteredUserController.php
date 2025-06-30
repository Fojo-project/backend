<?php

namespace App\Http\Controllers\Auth;

use App\enums\UserRole;
use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\RegisterRequest;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Auth;

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
        $user = User::create($data);
        $user->assignRole($data['role'] ?? UserRole::LEARNER->value);
        // event(new Registered($user));
        // $mailerService->sendVerificationEmail($user);
        $request->authenticate();
        $user = Auth::user();
        $token = $user->createToken($user->email, [], now()->addMinutes(2))->plainTextToken;
        $data = ['token' => $token];
        return $this->successResponse($data, 'Registration successful. A verification link has been sent to your email.', 201);
    }
}
