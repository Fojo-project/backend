<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthenticatedSessionController extends Controller
{
    /**
     * Handle an incoming authentication request.
     */
    public function store(LoginRequest $request): JsonResponse
    {
        return $this->successResponse('data', 'Logged in successfully', 200);
        // try {
        //     $request->authenticate();
        //     $user = Auth::user();
        //     $token = $user->createToken($user->email)->plainTextToken;
        //     $data = ['token' => $token];
        //     return $this->successResponse($data, 'Logged in successfully', 200);
        // } catch (\Exception $ex) {
        //     return $this->errorResponse(null, $ex->getMessage(), 500);
        // }
    }

    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): JsonResponse
    {
        $request->user()->currentAccessToken()->delete();
        return $this->successResponse(NULL, 'Logged out successfully', 204);
    }
}
