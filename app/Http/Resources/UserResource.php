<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     */
    public function toArray(Request $request): array
    {
        $user = $this->resource;

        return [
            'id' => $user->id,
            'full_name' => $user->full_name,
            'email' => $user->email,
            'provider' => $user->provider,
            'avatar' => $user->avatar,
            'role' => $user->roles->pluck('name')->first(),
            'deleted_at' => $user->deleted_at,
            'created_at' => $user->created_at,
            'updated_at' => $user->updated_at,
        ];
    }
}
