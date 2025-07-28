<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'full_name' => $this->full_name,
            'email' => $this->email,
            'provider' => $this->provider,
            'avatar' => $this->avatar,
            'role' => $this->roles->pluck('name')->first(),
            'dashboard' => $this->when(auth()->check(), $this->getDashboardStats()),
            // 'dashboard' => [
            //     'ongoing_course' => 0,
            //     'completed_course' => 0,
            //     'certificate' => 0,
            //     'hours_spent' => 0,
            // ],
            'deleted_at' => $this->deleted_at,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
