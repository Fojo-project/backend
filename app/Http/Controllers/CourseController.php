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
     * Display a listing of the all courses
     */
    public function index()
    {
        $courses = Course::with(['lessons', 'enrolledUsers'])->paginate(10);
        $courses = Course::with('lessons')->orderBy('id', 'asc')->paginate(10);
        return $this->successResponse(CourseResource::collection($courses), 'All courses retrieved successfully.', 200);
    }
    /**
     * Fetch all courses (Homepage)
     */
    public function getAllCourses()
    {
        $courses = Course::with(['lessons', 'enrolledUsers'])->paginate(10);
        $courses = Course::with('lessons')->orderBy('id', 'asc')->paginate(10);
        return $this->successResponse(CourseResource::collection($courses), 'All courses retrieved successfully.', 200);
    }

    /**
     * Store a newly created course.
     */
    public function store(StoreCourseRequest $request)
    {
        $course = Course::create($request->validated());
        return $this->paginatedResponse(new CourseResource($course), 'Course created successfully', 201);
    }

    /**
     * Display the specified course resource.
     */
    public function show(Course $course)
    {
        $course->load('lessons');
        return $this->successResponse(new CourseResource($course), 'Course fetched successfully');
    }

    /**
     * Update the specified course resource in storage.
     */
    public function update(UpdateCourseRequest $request, Course $course)
    {
        $course->update($request->validated());
        return $this->successResponse(new CourseResource($course), 'Course updated successfully ', 200);
    }

    /**
     * Remove the specified course resource from storage.
     */
    public function destroy(Course $course)
    {
        $course->delete();
        return $this->successResponse(null, 'Course deleted successfully', 204);
    }
    /**
     * User start a specified course resource.
     */
    public function enrollInCourse(Request $request, Course $course)
    {
        $user = $request->user();
        if (!$user->enrolledCourses()->where('course_id', $course->id)->exists()) {
            $user->enrolledCourses()->attach($course->id, ['started_at' => now(), 'completed' => false]);
            return $this->successResponse($course, 'You have enrolled in this course succesfully.', 201);
        } else {
            return $this->errorResponse(null, 'You have already enrolled in this course.', 400);
        }
    }
    /**
     * User mark a specified course resource as completed.
     */
    public function markCourseCompleted(Request $request, Course $course)
    {
        $user = $request->user();
        $user->enrolledCourses()->updateExistingPivot($course->id, ['completed' => true]);
        return $this->successResponse(null, 'Course marked as completed.');
    }
    /**
     * Get user started courses with lessons.
     * This method retrieves all courses that the user has started, including their lessons.
     */
    public function getUserEnrolledCourses(Request $request)
    {
        $courses = $request->user()->enrolledCourses()->with('lessons')->get();
        return $this->successResponse(
            CourseResource::collection($courses),
            'Your started courses fetched successfully.',
            200
        );
    }
}
