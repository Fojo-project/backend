<?php

namespace App\Services;

use Cloudinary\Cloudinary;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Log;
use InvalidArgumentException;
use Exception;

class UploadService
{
    protected Cloudinary $cloudinary;

    public function __construct()
    {
        $this->cloudinary = new Cloudinary([
            'cloud' => [
                'cloud_name' => env('CLOUDINARY_CLOUD_NAME'),
                'api_key' => env('CLOUDINARY_API_KEY'),
                'api_secret' => env('CLOUDINARY_API_SECRET'),
            ],
        ]);
    }

    /**
     * Upload a file to Cloudinary and return the secure URL.
     *
     * @param UploadedFile $file
     * @param string $folder
     * @return string
     * @throws Exception
     */
    public function upload(UploadedFile $file, string $folder = 'default'): string
    {
        if (!$file->isValid()) {
            throw new InvalidArgumentException('Invalid file upload.');
        }
        $realPath = $file->getRealPath();
        if (!$realPath) {
            throw new InvalidArgumentException('File path could not be resolved.');
        }
        try {
            $uploadResult = $this->cloudinary->uploadApi()->upload($realPath, [
                'folder' => $folder,
                'resource_type' => 'auto',
            ]);
            return $uploadResult['secure_url'] ?? throw new Exception('Upload failed, no URL returned.');
        } catch (Exception $e) {
            throw new Exception('Cloudinary upload failed: ' . $e->getMessage());
        }
    }
    /**
     * Delete a file from Cloudinary using its public_id.
     *
     * @param string $publicId
     * @return bool
     * @throws Exception
     */
    public function delete(string $publicId): bool
    {
        try {
            $result = $this->cloudinary->uploadApi()->destroy($publicId);
            return isset($result['result']) && $result['result'] === 'ok';
        } catch (Exception $e) {
            Log::error('Cloudinary delete error', ['message' => $e->getMessage()]);
            throw new Exception('Cloudinary delete failed: ' . $e->getMessage());
        }
    }
}
