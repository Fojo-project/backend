<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;


class NewPasswordController extends Controller
{
    /**
     * Reset user's password
     *
     */
    public function store(Request $request): JsonResponse
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
}
