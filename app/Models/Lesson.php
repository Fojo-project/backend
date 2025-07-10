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
    public function course()
    {
        return $this->belongsTo(Course::class);
    }
}
