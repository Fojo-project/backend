<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateProfileRequest;
use App\Http\Resources\UserResource;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
    public function update(UpdateProfileRequest $request)
    {
        $user = Auth::user();
        $user->update($request->validated());
        $data = new UserResource($user);
        return $this->successResponse($data, 'Profile updated successfully.');
    }



    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }


    /**
     * Delete user account.
     */
    public function destroy(string $id)
    {
        //
    }
}
