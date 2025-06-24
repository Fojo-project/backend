<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

require __DIR__ . '/auth.php';

Route::middleware(['auth:sanctum'])->group(function () {
    //dashboard
    // Route::get('/dashboard', [DashboardController::class, 'dashboard']);
    //user
    Route::get('/me', [ProfileController::class, 'getUserSession']);
});

