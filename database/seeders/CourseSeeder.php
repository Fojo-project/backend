<?php

namespace Database\Seeders;

use App\Models\Course;
use App\Models\Lesson;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CourseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $courses = [
            [
                'title' => 'foundations',
                'color_code' => '#683504',
                'description' => 'Start your journey with core teachings on salvation, prayer, and Scripture.',
                'lesson_count' => 13,
                "course_image" => "/images/course/foundations.jpg"
            ],
            [
                'title' => 'discipleship',
                'color_code' => '#106C19',
                'description' => 'Learn to follow Jesus daily with obedience and intimacy.',
                'lesson_count' => 15,
                "course_image" => "/images/course/discipleship.jpg"
            ],
            [
                'title' => 'ministry',
                'color_code' => '#651DC3',
                'description' => 'Discover your calling and how to serve effectively in the body of Christ.',
                'lesson_count' => 20,
                "course_image" => "/images/course/ministry.jpg"
            ],
            [
                'title' => 'leadership',
                'color_code' => '#AF7719',
                'description' => 'Grow into a Christ-centered leader — humble, bold, and Spirit-led.',
                'lesson_count' => 10,
                "course_image" => "/images/course/leadership.jpg"
            ],
        ];

        foreach ($courses as $courseData) {
            $course = Course::factory()->create([
                'title' => $courseData['title'],
                'slug' => $courseData['title'],
                'description' => $courseData['description'],
                'course_image' => $courseData['course_image'],
                'color_code' => $courseData['color_code'],
            ]);
            for ($i = 1; $i <= $courseData['lesson_count']; $i++) {
                Lesson::factory()->create([
                    'course_id' => $course->id,
                    'lesson_order' => $i,
                ]);
            }
        }
    }
}
