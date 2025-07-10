<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCourseRequest;
use App\Http\Requests\UpdateCourseRequest;
use App\Http\Resources\CourseResource;
use App\Models\Course;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $courses = Course::with('lessons')->orderBy('id', 'asc')->paginate(10);
        return $this->successResponse(CourseResource::collection($courses), 'All courses retrieved successfully.', 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCourseRequest $request)
    {
        $course = Course::create($request->validated());
        return $this->paginatedResponse(new CourseResource($course), 'Course created successfully', 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(Course $course)
    {
        $course->load('lessons');
        return $this->successResponse(new CourseResource($course), 'Course fetched successfully');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCourseRequest $request, Course $course)
    {
        $course->update($request->validated());
        return $this->successResponse(new CourseResource($course), 'Course updated successfully ', 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Course $course)
    {
        $course->delete();
        return $this->successResponse(null, 'Course deleted successfully', 204);
    }
    public function startCourse(Request $request, Course $course)
    {
        $user = $request->user();
        if (!$user->userCourses()->where('course_id', $course->id)->exists()) {
            $user->userCourses()->attach($course->id, [
                'started_at' => now(),
                'completed' => false,
            ]);
        }
        return $this->successResponse($course, 'Course started successfully.', 201);
    }
    public function markCourseCompleted(Request $request, Course $course)
    {
        $user = $request->user();
        $user->userCourses()->updateExistingPivot($course->id, ['completed' => true]);
        return $this->successResponse(null, 'Course marked as completed.');
    }
    public function getUserCourses(Request $request)
    {
        $courses = $request->user()->userCourses()->with('lessons')->get();
        return $this->successResponse(
            CourseResource::collection($courses),
            'Your started courses fetched successfully.',
            200
        );
    }
}
