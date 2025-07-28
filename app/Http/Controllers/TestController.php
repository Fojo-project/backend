<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Services\UploadService;
use App\Utils\Utils;
use Cloudinary\Cloudinary;
use Illuminate\Http\Request;

class TestController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    protected UploadService $uploadService;

    public function __construct(UploadService $uploadService)
    {
        $this->uploadService = $uploadService;
    }
    public function index()
    {
        $users = User::all();
        return $this->successResponse($users, 'User Details fetched successfully', 200);
    }

    public function uploadFile(Request $request)
    {
        $request->validate([
            'file' => 'required|file|max:2048',
            'folder' => 'nullable|string',
        ]);
        try {
            $secureUrl = $this->uploadService->upload(
                $request->file('file'),
                $request->input('folder', 'my_uploads')
            );
            return response()->json(['secure_url' => $secureUrl]);
        } catch (\Throwable $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }

    public function deleteFile(Request $request)
    {
        $request->validate([
            'public_id' => 'required|string',
        ]);

        try {
            $deleted = $this->uploadService->delete($request->public_id);

            if ($deleted) {
                return response()->json(['message' => 'Deleted successfully.']);
            }

            return response()->json(['error' => 'Delete failed.'], 500);
        } catch (\Throwable $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $user = User::create([
            'full_name' => $request->input('full_name'),
            'email' => $request->input('email'),
            'password' => bcrypt($request->input('password')),
        ]);
        return $this->successResponse($user, 'User Details saved successfully', 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
