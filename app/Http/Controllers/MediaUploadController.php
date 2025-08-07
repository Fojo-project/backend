<?php

namespace App\Http\Controllers;

use App\Http\Resources\UserResource;
use App\Services\UploadService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MediaUploadController extends Controller
{
    public function __construct(protected UploadService $uploadService)
    {
    }

    /**
     * Handle dynamic media uploads.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function upload(Request $request)
    {
        $request->validate([
            'file' => ['required', 'file', 'max:2048'],
            'type' => ['required', 'string', 'in:user,course,lesson,document'],
        ]);

        $url = $this->uploadService->upload($request->file('file'), $request->type);

        if ($request->type === 'user') {
            $user = Auth::user();
            $user->update(['avatar' => $url]);
            $user->refresh();
            return $this->successResponse(new UserResource($user), 'Profile picture uploaded and updated.', 201);
        }

        return $this->successResponse(
            [
                'url' => $url,
                'type' => $request->type,
            ],
            'Media uploaded successfully.'
        );
    }
}
