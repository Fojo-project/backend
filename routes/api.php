<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TestController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\NewPasswordController;
use App\Http\Controllers\Auth\PasswordResetLinkController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\auth\SocialAuthController;
use App\Http\Controllers\Auth\VerifyEmailController;


Route::get('/ping', fn() => response()->json(['pong' => true]));

Route::post('/register', [RegisteredUserController::class, 'store'])
    ->middleware('guest')
    ->name('register');

Route::post('/login', [AuthenticatedSessionController::class, 'store'])
    ->middleware('guest')
    ->name('login');

Route::post('/forgot-password', [PasswordResetLinkController::class, 'store'])
    ->middleware('guest')
    ->name('password.email');

Route::post('/reset-password', [NewPasswordController::class, 'store'])
    ->middleware('guest')
    ->name('password.store');

Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])
    ->middleware('auth:sanctum')
    ->name('logout');

Route::post('/auth/social/{provider}', [SocialAuthController::class, 'handle'])->middleware('guest')
    ->name('social.auth');

Route::post('/verify-email/resend', [VerifyEmailController::class, 'resendVerification'])
    ->middleware(['throttle:6,1'])
    ->name('verify.resend');

Route::post('/verify-email', [VerifyEmailController::class, 'verifyEmail'])
    ->middleware(['throttle:6,1'])
    ->name('verification.verify');

Route::middleware(['guest'])->group(function () {
    Route::apiResource('/test', TestController::class);
});
Route::middleware(['auth:sanctum'])->group(function () {
    //dashboard
    // Route::get('/dashboard', [DashboardController::class, 'dashboard']);
    //user
    Route::get('/me', [ProfileController::class, 'getUserSession']);
});

