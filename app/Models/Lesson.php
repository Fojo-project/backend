<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
/**
 * App\Models\Lesson
 *
 * @property int $id
 * @property int $course_id
 * @property string $title
 * @property string|null $subtitle
 * @property string|null $lesson_note
 * @property string|null $lesson_test
 * @property string|null $lesson_video
 * @property string|null $lesson_image
 */
class Lesson extends Model
{
    /** @use HasFactory<\Database\Factories\LessonFactory> */
    use HasFactory;
    protected $fillable = [
        'course_id',
        'title',
        'slug',
        'subtitle',
        'lesson_note',
        'lesson_content',
        'lesson_video',
        'lesson_image',
        'lesson_order'
    ];
    protected static function booted(): void
    {
        static::addGlobalScope('ordered', function ($query) {
            $query->orderBy('lesson_order', 'asc');
        });
    }
    public function getRouteKeyName()
    {
        return 'slug';
    }
    public function course()
    {
        return $this->belongsTo(Course::class);
    }
    public function users()
    {
        return $this->belongsToMany(User::class, 'lesson_user')
            ->withPivot(['completed', 'completed_at'])
            ->withTimestamps();
    }
    public function nextLessons($count = 4)
    {
        return self::where('course_id', $this->course_id)
            ->where('lesson_order', '>', $this->lesson_order)
            ->orderBy('lesson_order')
            ->limit($count)
            ->get();
    }

    public function previousLessons($count = 4)
    {
        return self::where('course_id', $this->course_id)
            ->where('lesson_order', '<', $this->lesson_order)
            ->orderByDesc('lesson_order')
            ->limit($count)
            ->get()
            ->reverse()
            ->values();
    }

}
