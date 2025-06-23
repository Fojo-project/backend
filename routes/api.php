<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

require __DIR__ . '/auth.php';

Route::middleware(['can:view-docs'])->get('/docs/api', fn(Request $request) => $request->user());
Route::middleware(['auth:sanctum'])->get('/user', fn(Request $request) => $request->user());
