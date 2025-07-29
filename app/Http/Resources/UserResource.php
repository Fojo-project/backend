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
            'dashboard' => $this->getDashboardStats($user),
            'deleted_at' => $user->deleted_at,
            'created_at' => $user->created_at,
            'updated_at' => $user->updated_at,
        ];
    }

    /**
     * Get dashboard statistics for the user.
     */
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
            'completed_lessons' => $completedLessons,
            'total_lessons' => $totalLessons,
            'percentage_completed' => $totalLessons > 0
                ? round(($completedLessons / $totalLessons) * 100, 1)
                : 0,
        ];
    }
    // protected function getOngoingCourseProgress($user): ?array
    // {
    //     $ongoingCourse = $user->enrolledCourses
    //         ->where('pivot.completed', false)
    //         ->first();

    //     if (!$ongoingCourse) {
    //         return null;
    //     }

    //     $totalLessons = $ongoingCourse->lessons()->count();
    //     $completedLessons = $user->completedLessons()
    //         ->where('course_id', $ongoingCourse->id)
    //         ->count();

    //     return [
    //         'title' => $ongoingCourse->title,
    //         'slug' => $ongoingCourse->slug,
    //         'completed_lessons' => $completedLessons,
    //         'total_lessons' => $totalLessons,
    //         'percentage_completed' => $totalLessons > 0
    //             ? round(($completedLessons / $totalLessons) * 100, 1)
    //             : 0,
    //     ];
    // }
}
