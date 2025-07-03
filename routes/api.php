<?php

use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\auth\SocialAuthController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TestController;
use Illuminate\Support\Facades\Route;


Route::get('/ping', fn() => response()->json(['pong' => true]));

Route::post('/register', [AuthController::class, 'register'])
    ->middleware('guest')
    ->name('register');

Route::post('/login', [AuthController::class, 'login'])
    ->middleware('guest')
    ->name('login');

Route::post('/forgot-password', [AuthController::class, 'sendPasswordResetLink'])
    ->middleware('guest')
    ->name('password.email');

Route::post('/reset-password', [AuthController::class, 'resetPassword'])
    ->middleware('guest')
    ->name('password.store');

Route::post('/logout', [AuthController::class, 'logout'])
    ->middleware('auth:sanctum')
    ->name('logout');

Route::post('/auth/social/{provider}', [SocialAuthController::class, 'handle'])->middleware('guest')
    ->name('social.auth');

Route::post('/verify-email/resend', [AuthController::class, 'resendVerification'])
    ->middleware(['throttle:6,1'])
    ->name('verify.resend');

Route::post('/verify-email', [AuthController::class, 'verifyEmail'])
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

