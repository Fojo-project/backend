<?php

namespace Database\Seeders;

use App\Enums\UserRole;
use App\Models\Course;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user1 = User::factory()->create([
            'full_name' => 'User One',
            'email' => 'user1@gmail.com',
            'password' => \Hash::make('password'),
            'verification_token' => \Hash::make(Str::random(64)),
            'verification_token_created_at' => now(),
        ]);
        $user1->assignRole(UserRole::LEARNER->value);

        $user2 = User::factory()->create([
            'full_name' => 'User Two',
            'email' => 'user2@gmail.com',
            'password' => \Hash::make('password'),
            'verification_token' => \Hash::make(Str::random(64)),
            'verification_token_created_at' => now(),
        ]);
        $user2->assignRole(UserRole::LEARNER->value);
        // Get random courses
        $courses = Course::inRandomOrder()->take(4)->pluck('id');
        // Attach 2 random courses to user1
        $user1->enrolledCourses()->attach($courses->slice(0, 2), [
            'started_at' => now(),
            'completed' => false,
        ]);
        // Attach 1 random course to user2
        $user2->enrolledCourses()->attach($courses->slice(2, 1), [
            'started_at' => now(),
            'completed' => true,
        ]);
    }
}
