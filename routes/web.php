<?php

use Illuminate\Support\Facades\Route;

// ----------------------
// Frontend Controllers
// ----------------------
use App\Http\Controllers\Frontend\HomeController;
use App\Http\Controllers\Frontend\AboutController;
use App\Http\Controllers\Frontend\ContactController;
use App\Http\Controllers\Frontend\MyCourseController;
use App\Http\Controllers\Frontend\UserController as FrontUserController;

// ----------------------
// Backend Controllers
// ----------------------
use App\Http\Controllers\Backend\AdminAuthController;
use App\Http\Controllers\Backend\DashboardController;
use App\Http\Controllers\Backend\UserController; // admin manages users
use App\Http\Controllers\Backend\StudentController;
use App\Http\Controllers\Backend\CourseController;
use App\Http\Controllers\Backend\TeacherController;
use App\Http\Controllers\Backend\ScheduleController;
use App\Http\Controllers\Backend\ReportController;
use App\Http\Controllers\Backend\SettingController;

// ----------------------
// Frontend Pages
// ----------------------

// Home, About, Contact pages
Route::get('/', [HomeController::class, 'index'])->name('frontend.home');
Route::get('/about', [AboutController::class, 'index'])->name('frontend.about');
Route::get('/contact', [ContactController::class, 'index'])->name('frontend.contact');
Route::post('/contact', [ContactController::class, 'submit'])->name('frontend.contact.submit');



// Group all MyCourse routes with auth middleware
Route::middleware('auth')->group(function () {

    // My Course page (list of enrolled courses)
    Route::get('/my-course', [MyCourseController::class, 'index'])
        ->name('frontend.myCourse');

    // Enroll action
    Route::post('/courses/{id}/enroll', [MyCourseController::class, 'enroll'])
        ->name('courses.enroll');

    // Remove a course from My Courses
    Route::post('/my-course/{id}/remove', [MyCourseController::class, 'remove'])
        ->name('myCourse.remove');

    // View single course details
    Route::get('/my-course/{id}', [MyCourseController::class, 'showCourse'])
        ->name('frontend.myCourse.showCourse');
});

// ----------------------
// Frontend User Authentication

// Guest routes
Route::middleware('guest')->group(function () {
    // Show login form
    Route::get('/user/login', [FrontUserController::class, 'showLoginForm'])->name('user.login');
    // Process login
    Route::post('/user/login', [FrontUserController::class, 'login'])->name('user.login.submit');

    // Show register form
    Route::get('/user/register', [FrontUserController::class, 'showRegisterForm'])->name('user.register');
    // Process registration
    Route::post('/user/register', [FrontUserController::class, 'register'])->name('user.register.submit');
});

// Authenticated routes
Route::middleware('auth')->group(function () {
    // Logout
    Route::post('/user/logout', [FrontUserController::class, 'logout'])->name('user.logout');
});

// ----------------------
// Admin Authentication (Public)
Route::get('/admin/login', [AdminAuthController::class, 'showLoginForm'])->name('admin.login');
Route::post('/admin/login', [AdminAuthController::class, 'login'])->name('admin.login.submit');
Route::post('/admin/logout', [AdminAuthController::class, 'logout'])->name('admin.logout');

// ----------------------
// Admin Protected Routes (Requires auth:admin)
Route::prefix('admin')->name('admin.')->middleware(['auth:admin'])->group(function () {
    // Dashboard
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    // Admin manages users and other resources
    Route::resources([
        'users'     => UserController::class,
        'students'  => StudentController::class,
        'courses'   => CourseController::class,
        'teachers'  => TeacherController::class,
        'settings'  => SettingController::class,
        'reports'   => ReportController::class,
        'schedule'  => ScheduleController::class,
    ]);
});
