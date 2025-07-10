<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreLessonRequest;
use App\Http\Resources\LessonResource;
use App\Models\Course;
use Illuminate\Http\Request;

class CourseLessonController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Course $course)
    {
        $lessons = $course->lessons()->latest()->paginate(10);
        return $this->paginatedResponse(LessonResource::collection($lessons), 'Lessons for this course fetched successfully', 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreLessonRequest $request, Course $course)
    {
        $lesson = $course->lessons()->create($request->validated());
        return $this->successResponse(new LessonResource($lesson), 'Lesson created under course successfully', 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
