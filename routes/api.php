<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TestController;
use Illuminate\Support\Facades\Route;

require __DIR__ . '/auth.php';

Route::get('/ping', fn() => response()->json(['pong' => true]));
Route::middleware(['guest'])->group(function () {
    Route::apiResource('/test', TestController::class);
});
Route::middleware(['auth:sanctum'])->group(function () {
    //dashboard
    // Route::get('/dashboard', [DashboardController::class, 'dashboard']);
    //user
    Route::get('/me', [ProfileController::class, 'getUserSession']);
});

