<?php

namespace App\Http\Controllers\Auth;

use App\Enums\UserRole;
use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\SocialAuthRequest;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;


class SocialAuthController extends Controller
{
    public function handle(SocialAuthRequest $request, string $provider)
    {
        try {
            $data = $request->validated();
            $user = User::firstOrCreate(
                ['email' => $data['email']],
                [
                    'full_name' => $data['full_name'],
                    'avatar' => $data['avatar'],
                    'provider' => $provider,
                    'password' => Hash::make(Str::random(16)),
                    'email_verified_at' => now(),
                ]
            );
            $user->assignRole(UserRole::LEARNER->value);
            $request->authenticateEmailOnly($user);
            $token = $user->createToken($user->email)->plainTextToken;
            $data = ['token' => $token];
            return $this->successResponse($data, 'User was registered/logged in successfully', 201);
        } catch (\Exception $e) {
            return $this->errorResponse(NULL, $e->getMessage() ?: 'Error, please try again!!!', 500);
        }
    }
}
