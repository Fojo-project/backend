<?php

namespace App\Models;

use App\Enums\Status;
use App\Enums\UserRole;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use HasFactory, Notifiable, HasRoles, HasApiTokens, SoftDeletes;
    protected $guard_name = 'api';

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'full_name',
        'email',
        'password',
        'provider',
        'avatar',
        'delete_reason',
        'remember_token',
        'email_verified_at',
        'verification_token',
        'verification_token_created_at',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
        'pivot',
        'verification_token',
        'verification_token_created_at',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
            'verification_token' => 'string',
            'verification_token_created_at' => 'datetime',
            'role' => UserRole::class,
            'status' => Status::class,
            'deleted_at' => 'datetime',
        ];
    }
    public function enrolledCourses()
    {
        return $this->belongsToMany(Course::class, 'course_user')
            ->withTimestamps()
            ->withPivot(['started_at', 'completed']);
    }
    public function completedLessons()
    {
        return $this->belongsToMany(Lesson::class, 'lesson_user')
            ->withPivot(['completed', 'completed_at'])
            ->withTimestamps();
    }
    public function getDashboardStats(): array
    {
        $user = $this;
        // Get all course IDs the user has started
        $startedCourseIds = $user->enrolledCourses()->pluck('courses.id');

        // Prepare tracking
        $ongoing = 0;
        $completed = 0;
        $hoursSpent = 0;

        foreach ($startedCourseIds as $courseId) {
            $course = \App\Models\Course::withCount('lessons')->find($courseId);

            $completedLessonsCount = $user->completedLessons()
                ->where('course_id', $courseId)
                ->count();

            // Completed or Ongoing
            if ($completedLessonsCount >= $course->lessons_count) {
                $completed++;
            } else {
                $ongoing++;
            }

            // Sum up lesson durations
            $lessonIds = $user->completedLessons()
                ->where('course_id', $courseId)
                ->pluck('lesson_id');

            $hoursSpent += \App\Models\Lesson::whereIn('id', $lessonIds)->sum('duration');
        }

        return [
            'ongoing_course' => $ongoing,
            'completed_course' => $completed,
            'hours_spent' => round($hoursSpent / 60, 1),
        ];
    }
}
