<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;

class PasswordResetLinkController extends Controller
{
    /**
     * Handle an incoming password reset link request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): JsonResponse
    {
        $request->validate([
            'email' => 'required|email|exists:users,email',
        ]);
        $user = User::where('email', $request->input('email'))->firstOrFail();
        $token = Password::createToken($user);
        $frontendUrl = config('app.frontend_url') . "/reset-password?token={$token}&email=" . urlencode($user->email);
        return $this->successResponse(
            $frontendUrl,
            'Password reset link generated.',
        );
    }
}
