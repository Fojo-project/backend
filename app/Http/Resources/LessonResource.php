<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\Auth;

class LessonResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        $user = Auth::user();
        return [
            'id' => $this->id,
            'course_id' => $this->course_id,
            'course_slug' => $this->course?->slug,
            'lesson_order' => $this->lesson_order,
            'title' => $this->title,
            'slug' => $this->slug,
            'subtitle' => $this->subtitle,
            'lesson_note' => $this->lesson_note,
            'lesson_content' => $this->lesson_content,
            'lesson_video' => $this->lesson_video,
            'lesson_image' => $this->lesson_image,
            'lesson_duration' => $this->lesson_duration,
            'isCompleted' => $user
                ? $user->completedLessons->contains($this->id)
                : false,
            'created_at' => $this->created_at,
        ];
    }
}
