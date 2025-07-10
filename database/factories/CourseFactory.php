<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Course>
 */
class CourseFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $titles = ['foundations', 'discipleship', 'ministry', 'leadership'];
        $title = $this->faker->randomElement($titles);
        $colors = [
            'foundations' => '#683504',
            'discipleship' => '#106C19',
            'ministry' => '#651DC3',
            'leadership' => '#AF7719',
        ];

        return [
            'title' => 'foundations', // default, overridden in seeder
            'subtitle' => $this->faker->sentence,
            'description' => null,
            'about_course' => $this->faker->paragraph(50),
            'course_video' => $this->faker->randomElement([
                'https://www.youtube.com/watch?v=dQw4w9WgXcQ',
                'https://www.youtube.com/watch?v=ysz5S6PUM-U',
                'https://www.youtube.com/watch?v=3JZ_D3ELwOQ',
                'https://www.youtube.com/watch?v=Zi_XLOBDo_Y',
                'https://www.youtube.com/watch?v=kXYiU_JCYtU',
            ]),
            'course_text' => $this->faker->text(600),
            'color_code' => '#683504',
        ];
    }
}
