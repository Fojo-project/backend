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
            'title' => $this->title,
            'subtitle' => $this->subtitle,
            'lesson_note' => $this->lesson_note,
            'lesson_content' => $this->lesson_content,
            'lesson_video' => $this->lesson_video,
            'lesson_image' => $this->lesson_image,
            'created_at' => $this->created_at,
        ];
    }
}
