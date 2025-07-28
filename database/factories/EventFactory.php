<?php

namespace Database\Factories;

use App\Enums\EventStatus;
use App\Models\Event;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Event>
 */
class EventFactory extends Factory
{
    protected $model = Event::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $title = $this->faker->sentence(4);
        $slug = Str::slug($title) . '-' . Str::random(5);

        // Random future or past dates
        $startDate = $this->faker->dateTimeBetween('-30 days', '+30 days');
        $endDate = (clone $startDate)->modify('+2 hours');

        // Determine status based on start date
        $now = Carbon::now();
        $status = match (true) {
            $startDate < $now => EventStatus::ENDED,
            default => $this->faker->randomElement([
                EventStatus::SCHEDULED,
                EventStatus::POSTPONED,
                EventStatus::CANCELLED,
                EventStatus::LIVE,
            ])
        };

        return [
            'slug' => $slug,
            'title' => $title,
            'description' => $this->faker->paragraph(),

            'avatar' => $this->faker->imageUrl(640, 480, 'people', true),
            'video_url' => $this->faker->randomElement([
                'https://www.youtube.com/watch?v=aqz-KE-bpKQ',
                'https://vimeo.com/76979871',
                'https://www.w3schools.com/html/mov_bbb.mp4',
            ]),
            'audio_url' => $this->faker->randomElement([
                'https://www.soundhelix.com/examples/mp3/SoundHelix-Song-1.mp3',
                'https://www.soundhelix.com/examples/mp3/SoundHelix-Song-2.mp3',
                'https://www.w3schools.com/html/horse.mp3',
            ]),

            'start_date' => $startDate->format('Y-m-d'),
            'start_time' => $startDate->format('H:i:s'),
            'end_date' => $endDate->format('Y-m-d'),
            'end_time' => $endDate->format('H:i:s'),

            'status' => $status->value,
            'is_live' => $status === EventStatus::LIVE ? true : false,
        ];
    }
}
