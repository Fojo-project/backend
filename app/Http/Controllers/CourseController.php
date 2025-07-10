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
     * Fetch all courses (Dashboard)
     */
    public function index(Request $request)
    {
        $limit = $request->query('limit', 10);
        $courses = Course::with(['lessons', 'enrolledUsers'])->orderBy('id', 'asc')->paginate($limit);
        return $this->paginatedResponse(CourseResource::collection($courses), 'All courses retrieved successfully.', 200);
    }
    /**
     * Fetch all courses (Homepage)
     */
    public function getAllCourses()
    {
        $courses = Course::with(['lessons', 'enrolledUsers'])->orderBy('id', 'asc')->get();
        return $this->successResponse(CourseResource::collection($courses), 'All courses retrieved successfully.', 200);
    }

    /**
     * Create a new course resource.
     */
    public function store(StoreCourseRequest $request)
    {
        $course = Course::create($request->validated());
        return $this->paginatedResponse(new CourseResource($course), 'Course created successfully', 201);
    }

    /**
     * Display a course resource.
     */
    public function show(Course $course)
    {
        $course->load(['lessons', 'enrolledUsers']);
        return $this->successResponse(new CourseResource($course), 'Course fetched successfully');
    }

    /**
     * Update a course resource.
     */
    public function update(UpdateCourseRequest $request, Course $course)
    {
        $course->update($request->validated());
        return $this->successResponse(new CourseResource($course), 'Course updated successfully ', 200);
    }

    /**
     * Delete a course resource.
     */
    public function destroy(Course $course)
    {
        $course->delete();
        return $this->successResponse(null, 'Course deleted successfully', 204);
    }
    /**
     * Start|Enrol a specified course resource.
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
     * Mark a course resource as completed.
     */
    public function markCourseCompleted(Request $request, Course $course)
    {
        $user = $request->user();
        $user->enrolledCourses()->updateExistingPivot($course->id, ['completed' => true]);
        return $this->successResponse(null, 'Course marked as completed.');
    }
    /**
     * Get all courses the user has enrolled in.
     */
    public function getUserEnrolledCourses(Request $request)
    {
        $limit = $request->query('limit', 10);
        $courses = $request->user()->enrolledCourses()->with(['lessons', 'enrolledUsers'])->orderBy('id', 'asc')->paginate($limit);
        return $this->paginatedResponse(
            CourseResource::collection($courses),
            'Your started courses fetched successfully.',
            200
        );
    }
}
