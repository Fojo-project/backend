<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Str;
use Illuminate\Validation\Rules;
use Dedoc\Scramble\Attributes\QueryParam;
use Illuminate\Validation\ValidationException;

class NewPasswordController extends Controller
{
    /**
     * Reset user's password using signed link
     *
     * @queryParam token string required The reset token. Example: abc123token
     * @queryParam email string required The user's email. Example: user@example.com
     * @queryParam expires int required Link expiration timestamp. Example: 1751466230
     * @queryParam signature string required Security signature. Example: 418efd26af004a1e5b90...
     *
     * @bodyParam password string required The new password. Example: strongpassword
     * @bodyParam password_confirmation string required Must match the password. Example: strongpassword
     *
     * @response 200 {
     *   "status": true,
     *   "message": "Password reset successful."
     * }
     */
    public function store(Request $request): JsonResponse
    {
        $request->validate([
            'token' => ['required'],
            'email' => ['required', 'email', 'exists:users,email'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);
        $status = Password::reset(
            $request->only('email', 'token', 'password', 'password_confirmation'),
            function ($user) use ($request) {
                $user->forceFill([
                    'password' => Hash::make($request->password),
                ])->save();
            }
        );
        return $status === Password::PASSWORD_RESET
            ? $this->successResponse(NULL, 'Password reset successful.')
            : $this->errorResponse(NULL, __($status), 400);
    }
}
