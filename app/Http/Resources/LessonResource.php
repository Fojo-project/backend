<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class LessonResource extends JsonResource
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
            'course_id' => $this->course_id,
            'lesson_order' => $this->lesson_order,
            'video_duration' => $this->video_duration,
            'title' => $this->title,
            'slug' => $this->slug,
            'subtitle' => $this->subtitle,
            'lesson_note' => $this->lesson_note,
            'lesson_content' => $this->lesson_content,
            'lesson_video' => $this->lesson_video,
            'lesson_image' => $this->lesson_image,
            'lesson_duration' => $this->lessons_duration,
            'created_at' => $this->created_at,
        ];
    }
}
