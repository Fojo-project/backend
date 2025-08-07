<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class DashboardResource extends JsonResource
{

    protected function getDashboardStats($user): array
    {
        $totalEnrolled = $user->enrolledCourses->count();
        $completedCourses = $user->enrolledCourses->where('pivot.completed', true)->count();
        $ongoingCourses = $totalEnrolled - $completedCourses;
        $hoursSpentMinutes = $user->completedLessons->sum('lesson_duration');
        $hoursSpent = round($hoursSpentMinutes / 60, 1);

        return [
            'ongoing_course' => $ongoingCourses,
            'completed_course' => $completedCourses,
            'certificate' => $completedCourses,
            'hours_spent' => $hoursSpent,
            'current_ongoing_course' => $this->getOngoingCourseProgress($user),
        ];
    }

    /**
     * Get the first ongoing course with progress.
     */
    protected function getOngoingCourseProgress($user): ?array
    {
        // Get all ongoing (not completed) enrolled courses
        $ongoingCourses = $user->enrolledCourses
            ->where('pivot.completed', false);

        // Return null if there are no ongoing courses
        if ($ongoingCourses->isEmpty()) {
            return null;
        }

        // Pick a random one
        $ongoingCourse = $ongoingCourses->random();

        $totalLessons = $ongoingCourse->lessons()->count();
        $completedLessons = $user->completedLessons()
            ->where('course_id', $ongoingCourse->id)
            ->count();

        return [
            'title' => $ongoingCourse->title,
            'slug' => $ongoingCourse->slug,
            'course_image' => $ongoingCourse->course_image,
            'completed_lessons' => $completedLessons,
            'total_lessons' => $totalLessons,
            'percentage_completed' => $totalLessons > 0
                ? round(($completedLessons / $totalLessons) * 100, 1)
                : 0,
        ];
    }
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        $user = $this->resource;
        return $this->getDashboardStats($user);
    }
}
