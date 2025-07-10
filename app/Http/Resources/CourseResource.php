<?php

namespace App\Http\Resources;

use Auth;
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
        $user = $request->user();
        $lessons = $this->relationLoaded('lessons') ? $this->lessons : collect();
        $totalLessons = $lessons->count();

        $completedLessonCount = 0;

        if ($user && $totalLessons > 0) {
            $completedLessonCount = $user->completedLessons()
                ->where('course_id', $this->id)
                ->count();
        }

        return [
            'id' => $this->id,
            'title' => $this->title,
            'slug' => $this->slug,
            'subtitle' => $this->subtitle,
            'description' => $this->description,
            'about_course' => $this->about_course,
            'course_video' => $this->course_video,
            'course_image' => $this->course_image,
            'course_text' => $this->course_text,
            'color_code' => $this->color_code,
            'created_at' => $this->created_at,

            // Lesson info
            'lessons' => LessonResource::collection($lessons),
            'lesson_count' => $lessons->count(),
            // Progress tracking
            'lesson_progress' => [
                'total_lessons' => $totalLessons,
                'completed_lessons' => $completedLessonCount,
                'percentage_completed' => $totalLessons > 0
                    ? round(($completedLessonCount / $totalLessons) * 100, 1)
                    : 0,
            ],
            // Enrollment status
            'isStarted' => $user
                ? $this->enrolledUsers->contains($user->id)
                : false,
        ];
    }
}
