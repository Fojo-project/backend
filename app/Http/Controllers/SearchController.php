<?php

namespace App\Http\Controllers;

use App\Http\Resources\CourseResource;
use App\Http\Resources\LessonResource;
use App\Models\Course;
use App\Models\Lesson;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function search(Request $request)
    {
        $query = trim($request->input('query', ''));

        if (!$query) {
            return $this->errorResponse(null, 'Please provide a search term.', 422);
        }

        $courses = Course::query()
            ->where(function ($q) use ($query) {
                $q->where('title', 'LIKE', "%{$query}%")
                    ->orWhere('subtitle', 'LIKE', "%{$query}%")
                    ->orWhere('description', 'LIKE', "%{$query}%");
            })
            ->get();

        $lessons = Lesson::query()
            ->where(function ($q) use ($query) {
                $q->where('title', 'LIKE', "%{$query}%")
                    ->orWhere('subtitle', 'LIKE', "%{$query}%")
                    ->orWhere('lesson_note', 'LIKE', "%{$query}%");
            })
            ->get();

        return $this->successResponse([
            'courses' => CourseResource::collection($courses),
            'lessons' => LessonResource::collection($lessons),
        ], 'Search results fetched successfully.');
    }
}
