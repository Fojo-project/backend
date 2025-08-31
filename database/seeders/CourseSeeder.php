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
                'about_course' => 'Welcome to an amazing journey of understanding your faith. Whether you are a new believer or a seasoned Christian, the topics in this school are fundamental truths you need to know to begin growing a strong relationship with Jesus. You will find answers to questions such as: Can a Christian lose his salvation? How was the Bible compiled? Eschatology and the end times. Start now and be transformed through these wonderful teachings.',
                'description' => 'Start your journey with core teachings on salvation, prayer, and Scripture.',
                "course_image" => "/images/course/foundations.jpg"
            ],
            [
                'title' => 'discipleship',
                'color_code' => '#106C19',
                'about_course' => 'Being a follower of Jesus requires a daily walk with the Holy Spirit and the Word of God. From the basics of understanding salvation to the hard core truths of what it means to die to sin and live for Christ, this section covers topics to grow you into a willing and faithful follower of Jesus. You will cover topics such as The Fruit of The Spirit, Activation of gifts and what it means to be fruitful as a believer. Start now with the life changing teaching on The Cost of Discipleship.',
                'description' => 'Learn to follow Jesus daily with obedience and intimacy.',
                "course_image" => "/images/course/discipleship.jpg"
            ],
            [
                'title' => 'ministry',
                'color_code' => '#651DC3',
                'about_course' => 'Every believer has been blessed with a Call and gifts. Starting from the Five-fold ministry to using your natural skills and gifts to serve the Body of Christ, this section will help you get started on carrying out your assignment as a follower of Jesus. If you are already on that Journey, go through this school to equip yourself with more knowledge and understanding. Remember God put you on this Earth for a purpose and you must fulfill it. This section will help you become totally transformed!!',
                'description' => 'Discover your calling and how to serve effectively in the body of Christ.',
                "course_image" => "/images/course/ministry.jpg"
            ],
            [
                'title' => 'leadership',
                'color_code' => '#AF7719',
                'about_course' => 'Everyone is called to be a leader. In whatever sphere you find yourself; In your home, your workplace, your business, your community and even in your relationships, Jesus calls you to lead. The servant kind of leadership is not what the world practices. Going through this course will empower you with core truths about being a Kingdom leader.

                Topics such as Ego and self in Leadership, wisdom and what leadership Jesus style really looks like, will revolutionize your outlook! Start now to become a transformational leader',
                'description' => 'Grow into a Christ-centered leader — humble, bold, and Spirit-led.',
                "course_image" => "/images/course/leadership.jpg"
            ],
        ];

        foreach ($courses as $courseData) {
            $course = Course::factory()->create([
                'title' => $courseData['title'],
                'slug' => $courseData['title'],
                'description' => $courseData['description'],
                'about_course' => $courseData['about_course'],
                'course_image' => $courseData['course_image'],
                'color_code' => $courseData['color_code'],
            ]);
        }
    }
}
