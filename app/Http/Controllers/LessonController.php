<?php

namespace App\Http\Controllers;

use App\Http\Resources\LessonResource;
use App\Models\Lesson;
use Illuminate\Http\Request;

class LessonController extends Controller
{
    /**
     * Show all lesson resources.
     */
    public function index()
    {
        $lessons = Lesson::latest()->paginate(10);
        return $this->paginatedResponse(LessonResource::collection($lessons), 'Lessons fetched successfully');
    }
    /**
     * Create a new lesson resource.
     */
    public function store(Request $request)
    {
        $lesson = Lesson::create($request->validated());
        return $this->successResponse(new LessonResource($lesson), 'Lesson created successfully', 201);
    }
    /**
     * Show a lesson resource.
     */
    public function show(Lesson $lesson)
    {
        $lesson->load('course');
        $previousLessons = $lesson->previousLessons();
        $nextLessons = $lesson->nextLessons();
        return $this->successResponse([
            'lesson' => new LessonResource($lesson),
            'previous_lessons' => LessonResource::collection($previousLessons),
            'next_lessons' => LessonResource::collection($nextLessons),
        ], 'Lesson retrieved successfully');
    }
    /**
     * Update a lesson resource.
     */
    public function update(Request $request, Lesson $lesson)
    {
        $lesson->update($request->validated());
        return $this->successResponse(new LessonResource($lesson), 'Lesson updated successfully');
    }
    /**
     * Delete a lesson resource.
     */
    public function destroy(Lesson $lesson)
    {
        $lesson->delete();
        return $this->successResponse(null, 'Lesson deleted successfully', 204);
    }
    /**
     * Mark a lesson as completed or watched
     */
    public function markLessonAsCompleted(Request $request, Lesson $lesson)
    {
        $user = $request->user();
        $user->completedLessons()->syncWithoutDetaching([
            $lesson->id => [
                'completed' => true,
                'completed_at' => now(),
            ]
        ]);
        return $this->successResponse(null, 'Lesson marked as completed.', 201);
    }
}
