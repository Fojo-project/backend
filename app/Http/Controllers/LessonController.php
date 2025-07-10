<?php

namespace App\Http\Controllers;

use App\Http\Resources\LessonResource;
use App\Models\Lesson;
use Illuminate\Http\Request;

class LessonController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $lessons = Lesson::latest()->paginate(10);
        return $this->paginatedResponse(LessonResource::collection($lessons), 'Lessons fetched successfully');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $lesson = Lesson::create($request->validated());
        return $this->successResponse(new LessonResource($lesson), 'Lesson created successfully', 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(Lesson $lesson)
    {
        return $this->successResponse(new LessonResource($lesson), 'Lesson fetched successfully');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Lesson $lesson)
    {
        $lesson->update($request->validated());
        return $this->successResponse(new LessonResource($lesson), 'Lesson updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Lesson $lesson)
    {
        $lesson->delete();
        return $this->successResponse(null, 'Lesson deleted successfully', 204);
    }
}
