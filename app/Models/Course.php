<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
/**
 * App\Models\Course
 *
 * @property int $id
 * @property string $title
 * @property string|null $subtitle
 * @property string|null $description
 * @property string|null $about_course
 * @property string|null $course_video
 * @property string|null $course_text
 * @property string|null $color_code
 */
class Course extends Model
{
    /** @use HasFactory<\Database\Factories\CourseFactory> */
    use HasFactory;
    protected $fillable = [
        'title',
        'subtitle',
        'description',
        'about_course',
        'course_video',
        'course_text',
        'color_code',
    ];
    public function lessons()
    {
        return $this->hasMany(Lesson::class);
    }
}
