<?php

namespace App\Http\Controllers;

use App\Http\Requests\ChangePasswordRequest;
use App\Http\Requests\DeleteAccountRequest;
use App\Http\Requests\UpdateProfileRequest;
use App\Http\Resources\UserResource;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    /**
     * Display a authenticated user details.
     */

    public function getUserSession(Request $request)
    {
        $user = $request->user();
        $data = new UserResource($user);
        return $this->successResponse($data, 'User Details fetched successfully', 200);
    }
    /**
     * Update the authenticated user's profile.
     */
    public function updateProfile(UpdateProfileRequest $request)
    {
        $user = Auth::user();
        $user->update($request->validated());
        $data = new UserResource($user);
        return $this->successResponse($data, 'Profile updated successfully.');
    }
    /**
     * Change the authenticated user's password.
     */
    public function changePassword(ChangePasswordRequest $request)
    {
        $user = auth()->user();
        if (!Hash::check($request->current_password, (string) $user->getAuthPassword())) {
            return $this->errorResponse(null, 'Current password is incorrect.', 422);
        }
        $user->update([
            'password' => bcrypt($request->new_password),
        ]);
        return $this->successResponse(null, 'Password changed successfully.', 201);
    }
    /**
     * Delete the authenticated user's account.
     */
    public function deleteAccount(DeleteAccountRequest $request)
    {
        $user = auth()->user();
        $user->update([
            'delete_reason' => $request->reason,
        ]);
        $user->delete();
        $user->tokens()->delete();
        return $this->successResponse(null, 'Your account has been deactivated successfully.');
    }
    /**
     * Restore the authenticated user's account.
     */
    public function restoreAccount(Request $request)
    {
        $request->validate([
            'email' => ['required', 'email'],
        ]);
        $user = User::withTrashed()->where('email', $request->email)->firstOrFail();
        if (!$user->trashed()) {
            return $this->errorResponse(null, 'Account is already active.', 400);
        }
        $user->restore();
        $user->update(['delete_reason' => null]);
        return $this->successResponse(null, 'Your account has been restored successfully. You can now log in.');
    }
}
