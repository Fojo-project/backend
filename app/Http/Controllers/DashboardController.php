<?php

namespace App\Http\Controllers;

use App\Http\Resources\DashboardResource;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    /**
     * User dashboard.
     */
    public function index()
    {
        $user = auth()->user()->load(['enrolledCourses.lessons', 'completedLessons']);
        $dashboardData = new DashboardResource($user);
        return $this->successResponse($dashboardData, 'Dashboard data retrieved successfully.', 200);
    }
}
