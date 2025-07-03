<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TestController;
use Illuminate\Support\Facades\Route;

require __DIR__ . '/auth.php';


Route::middleware(['guest'])->group(function () {
    Route::get('/test', [TestController::class, 'index']);
});
Route::middleware(['auth:sanctum'])->group(function () {
    //dashboard
    // Route::get('/dashboard', [DashboardController::class, 'dashboard']);
    //user
    Route::get('/me', [ProfileController::class, 'getUserSession']);
});

