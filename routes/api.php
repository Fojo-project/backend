<?php

use App\Http\Controllers\CourseController;
use App\Http\Controllers\CourseLessonController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\LessonController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Auth\SocialAuthController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TestController;

// Guest Routes
Route::middleware('guest')->group(function () {
    Route::controller(AuthController::class)->group(function () {
        Route::post('/register', 'register')->name('register');
        Route::post('/login', 'login')->name('login');
        Route::post('/forgot-password', 'sendPasswordResetLink')->name('password.email');
        Route::post('/reset-password', 'resetPassword')->name('password.store');
        Route::post('/verify-email', 'verifyEmail')->middleware('throttle:6,1')->name('verification.verify');
        Route::post('/verify-email/resend', 'resendVerification')->middleware('throttle:6,1')->name('verify.resend');
    });
    Route::post('/auth/social/{provider}', [SocialAuthController::class, 'handle'])->name('social.auth');

    Route::get('all-courses', [CourseController::class, 'getAllCourses']);
    Route::apiResource('lessons', LessonController::class)->only(['index', 'show']);
    Route::apiResource('courses.lessons', CourseLessonController::class)->only(['index']);

    Route::apiResource('/test', TestController::class);
    Route::post('/upload-file', [TestController::class, 'uploadFile']);
    Route::delete('/cloudinary/delete', [TestController::class, 'deleteFile']);

    //to be moved to admin routes
    Route::post('/profile/restore', [ProfileController::class, 'restoreAccount'])->name('profile.restore');

});

// Authenticated Routes
Route::middleware('auth:sanctum')->group(function () {
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
    // profile
    Route::controller(ProfileController::class)->group(function () {
        Route::get('/me', 'getUserSession');
        Route::delete('/profile', 'deleteAccount')->name('profile.delete');
        Route::put('/profile/update', 'updateProfile')->name('profile.update');
        Route::put('/profile/password', 'changePassword')->name('profile.password.change');
    });
    // lessons
    Route::apiResource('lessons', LessonController::class)->only(['store', 'update', 'destroy']);
    Route::post('/lessons/{lesson}/complete', [LessonController::class, 'markLessonAsCompleted']);
    // course
    Route::get('courses/user/course', [CourseController::class, 'getUserEnrolledCourses']);
    Route::post('/courses/{course}/start', [CourseController::class, 'enrollInCourse']);
    Route::post('/courses/{course}/complete', [CourseController::class, 'markCourseCompleted']);
    Route::apiResource('courses', CourseController::class);
    Route::apiResource('courses.lessons', CourseLessonController::class)->only(['store']);
    //events
    Route::get('/events/scheduled', [EventController::class, 'scheduledEvents']);
    Route::get('/events/live', [EventController::class, 'liveEvents']);
    Route::apiResource('events', EventController::class);
});
