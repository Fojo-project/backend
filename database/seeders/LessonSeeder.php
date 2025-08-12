<?php

namespace Database\Seeders;

use App\Models\Lesson;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Str;

class LessonSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $lessons = [
            [
                'course_id' => 1,
                'title' => 'Christ Our Foundation',
                'slug' => Str::slug('Christ Our Foundation'),
                'subtitle' => 'Christ Our Foundation',
                'lesson_note' => 'Focus on the active listening section.', // short note from the pdf
                'lesson_content' => 'In this lesson, we will explore various communication styles...', //pdf link
                'lesson_video' => 'https://example.com/videos/intro.mp4',
                'lesson_image' => 'images/lessons/intro.jpg',
                'lesson_order' => 1,
                'lesson_duration' => 15,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'course_id' => 1,
                'title' => 'Effective Communication',
                'slug' => Str::slug('Effective Communication'),
                'subtitle' => 'The key to leadership success',
                'lesson_note' => 'Focus on the active listening section.', // short note from the pdf
                'lesson_content' => 'In this lesson, we will explore various communication styles...', //pdf link
                'lesson_video' => 'https://example.com/videos/communication.mp4',
                'lesson_image' => 'images/lessons/communication.jpg',
                'lesson_order' => 2,
                'lesson_duration' => 20,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];

        Lesson::insert($lessons);
    }
}
