<?php

namespace Database\Factories;

use App\Models\Course;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Lesson>
 */
class LessonFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $title = $this->faker->unique()->sentence;
        $slug = str($title)->slug();
        return [
            'title' => $title,
            'slug' => $slug,
            'subtitle' => $this->faker->sentence,
            'lesson_duration' => $this->faker->randomElement([
                20,
                30,
                45,
                25,
                60,
                90,
                95,
                120,
                150,
                180
            ]),
            'lesson_note' => $this->faker->paragraph(10),
            'lesson_content' => $this->faker->paragraph(50),
            'lesson_video' => $this->faker->randomElement([
                'https://www.youtube.com/watch?v=dQw4w9WgXcQ',
                'https://www.youtube.com/watch?v=ysz5S6PUM-U',
                'https://www.youtube.com/watch?v=3JZ_D3ELwOQ',
                'https://www.youtube.com/watch?v=Zi_XLOBDo_Y',
                'https://www.youtube.com/watch?v=kXYiU_JCYtU',
            ]),
            'lesson_image' => $this->faker->imageUrl(800, 600, 'education', true, 'Lesson'),
        ];
    }
}
