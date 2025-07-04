<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Auth\SocialAuthController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TestController;

// Guest Routes
Route::middleware('guest')->group(function () {
    Route::controller(AuthController::class)->group(function () {
        Route::post('/register', 'register')->name('register');
        Route::post('/login', 'login')->name('login');
        Route::post('/forgot-password', 'sendPasswordResetLink')->name('password.email');
        Route::post('/reset-password', 'resetPassword')->name('password.store');
        Route::post('/verify-email', 'verifyEmail')->middleware('throttle:6,1')->name('verification.verify');
        Route::post('/verify-email/resend', 'resendVerification')->middleware('throttle:6,1')->name('verify.resend');
    });
    Route::post('/auth/social/{provider}', [SocialAuthController::class, 'handle'])->name('social.auth');

    Route::apiResource('/test', TestController::class);
});

// Authenticated Routes
Route::middleware('auth:sanctum')->group(function () {
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

    Route::controller(ProfileController::class)->group(function () {
        Route::get('/me', 'getUserSession');
    });

    // Example placeholder for future routes
    // Route::get('/dashboard', [DashboardController::class, 'dashboard']);
});
