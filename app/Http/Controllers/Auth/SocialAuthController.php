<?php

namespace App\Http\Controllers\auth;

use App\Enums\UserRole;
use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\SocialAuthRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;


class SocialAuthController extends Controller
{
    public function handle(SocialAuthRequest $request, string $provider)
    {
        try {
            // $user = User::where('email', $request->email)->first();
            $user = User::firstOrCreate(
                ['email' => $request->email],
                [
                    'full_name' => $request->full_name,
                    'provider' => $provider,
                    'password' => Hash::make(Str::random(16)),
                ]
            );
            $user->assignRole(UserRole::LEARNER->value);
            $request->authenticateEmailOnly();
            $user = Auth::user();
            $token = $user->createToken($user->email, [], now()->addMinutes(2))->plainTextToken;
            $data = ['token' => $token];
            return $this->successResponse($data, 'User was registered/logged in successfully', 201);
        } catch (\Exception $e) {
            return $this->errorResponse(NULL, $e->getMessage() ?: 'Error, please try again!!!', 500);
        }
    }
}
