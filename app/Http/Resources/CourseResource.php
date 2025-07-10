<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CourseResource extends JsonResource
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
            'title' => $this->title,
            'subtitle' => $this->subtitle,
            'description' => $this->description,
            'about_course' => $this->about_course,
            'course_video' => $this->course_video,
            'course_image' => $this->course_image,
            'course_text' => $this->course_text,
            'color_code' => $this->color_code,
            // 'lessons' => LessonResource::collection($this->whenLoaded('lessons')),
            'lesson_count' => $this->whenLoaded('lessons', fn() => $this->lessons->count()),
            'created_at' => $this->created_at,
        ];
    }
}
