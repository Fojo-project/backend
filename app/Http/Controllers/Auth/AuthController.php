<?php

namespace App\Http\Controllers\Auth;

use App\Enums\UserRole;
use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Http\Requests\Auth\RegisterRequest;
use App\Jobs\SendEmailVerificationJob;
use App\Jobs\SendResetPasswordMailJob;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Validation\Rules\Password;

class AuthController extends Controller
{
    public function login(LoginRequest $request): JsonResponse
    {
        $request->authenticate();
        $user = Auth::user();
        $token = $user->createToken($user->email)->plainTextToken;
        $data = ['token' => $token, 'role' => $user->roles->pluck('name')->first()];
        return $this->successResponse($data, 'Logged in successfully', 200);
    }
    public function register(RegisterRequest $request)
    {
        $data = $request->validated();
        $verificationToken = Str::random(64);
        $verifyUrl = sprintf(
            '%s/email-verification?token=%s&email=%s',
            rtrim(config('app.frontend_url'), '/'),
            $verificationToken,
            urlencode($data['email'])
        );

        DB::beginTransaction();

        try {
            $user = User::withTrashed()->where('email', $data['email'])->first();

            if ($user) {
                if ($user->trashed()) {
                    $user->restore();
                    $user->update([
                        'delete_reason' => null,
                        'verification_token' => Hash::make($verificationToken),
                        'verification_token_created_at' => now(),
                    ]);
                } else {
                    return $this->errorResponse(null, 'Email is already in use.', 409);
                }
            } else {
                $user = User::create([
                    ...$data,
                    'verification_token' => Hash::make($verificationToken),
                    'verification_token_created_at' => now(),
                ]);
            }

            $user->assignRole($data['role'] ?? UserRole::LEARNER->value);

            $request->authenticate();

            SendEmailVerificationJob::dispatch($user->full_name, $user->email, $verifyUrl)
                ->delay(now()->addSeconds(5));

            $token = $user->createToken($user->email)->plainTextToken;

            DB::commit();

            return $this->successResponse([
                'token' => $token,
                'role' => $user->roles->pluck('name')->first(),
            ], 'Registration successful. A verification link has been sent to your email.', 201);

        } catch (\Throwable $e) {
            DB::rollBack();
            return $this->errorResponse(null, 'Registration failed. Please try again later.', 500);
        }
    }

    // public function register(RegisterRequest $request)
    // {
    //     $data = $request->validated();
    //     $verificationToken = Str::random(64);
    //     $verifyUrl = sprintf(
    //         '%s/email-verification?token=%s&email=%s',
    //         rtrim(config('app.frontend_url'), '/'),
    //         $verificationToken,
    //         urlencode($data['email'])
    //     );

    //     DB::beginTransaction();

    //     try {
    //         $user = User::create([
    //             ...$data,
    //             'verification_token' => Hash::make($verificationToken),
    //             'verification_token_created_at' => now(),
    //         ]);

    //         $user->assignRole($data['role'] ?? UserRole::LEARNER->value);

    //         $request->authenticate();

    //         SendEmailVerificationJob::dispatch($user->full_name, $user->email, $verifyUrl)
    //             ->delay(now()->addSeconds(5));
    //         // Mail::to($user->email)->send(
    //         //     new EmailVerificationMail($user->full_name, $verifyUrl)
    //         // );

    //         $token = $user->createToken($user->email)->plainTextToken;
    //         DB::commit();

    //         return $this->successResponse([
    //             'token' => $token,
    //         ], 'Registration successful. A verification link has been sent to your email.', 201);

    //     } catch (\Throwable $e) {
    //         DB::rollBack();
    //         return $this->errorResponse(null, 'Registration failed. Please try again later.', 500);
    //     }
    // }

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

                $user?->tokens()?->delete();
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
        SendResetPasswordMailJob::dispatch($user->full_name, $user->email, $frontendUrl)
            ->delay(now()->addSeconds(5));
        // Mail::to($user->email)->send(
        //     new EmailVerificationMail($user->full_name, $verifyUrl)
        // );
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
        SendEmailVerificationJob::dispatch($user->full_name, $user->email, $verifyUrl)
            ->delay(now()->addSeconds(5));
        // Mail::to($user->email)->send(
        //     new EmailVerificationMail($user->full_name, $verifyUrl)
        // );
        $data = ['email_verification_url' => $verifyUrl];
        return $this->successResponse(null, 'A verification link has been resent to your email.', 201);
    }
    public function verifyEmail(Request $request)
    {
        $data = $request->validate([
            'email' => 'required|email|exists:users,email',
            'token' => ['required', 'string'],
        ]);

        $user = User::where('email', $data['email'])->firstOrFail();

        if ($user->hasVerifiedEmail()) {
            return $this->successResponse(null, 'Email has already verified.', 200);
        }

        $tokenCreatedAt = $user->verification_token_created_at;

        if (!$tokenCreatedAt || Carbon::parse($tokenCreatedAt)->diffInMinutes(now()) > 60) {
            return $this->errorResponse(null, 'Verification token expired.', 410);
        }

        // Check token match
        if (!Hash::check($data['token'], $user->verification_token)) {
            return $this->errorResponse(null, 'Invalid verification token.', 400);
        }

        // Mark email as verified
        $user->email_verified_at = now();
        $user->verification_token_created_at = null;
        $user->verification_token = null;
        $user->save();

        return $this->successResponse(null, 'Your email has been verified successfully.', 200);
    }

    public function logout(Request $request): JsonResponse
    {
        $request->user()->currentAccessToken()->delete();
        return $this->successResponse(NULL, 'Logged out successfully', 204);
    }
}
