<?php

use Illuminate\Support\Facades\Route;

// Frontend Controllers
use App\Http\Controllers\Frontend\HomeController;
use App\Http\Controllers\Frontend\AboutController;
use App\Http\Controllers\Frontend\ContactController;

// Backend Controllers
use App\Http\Controllers\Backend\UserController;
use App\Http\Controllers\Backend\DashboardController;
use App\Http\Controllers\Backend\StudentController;
use App\Http\Controllers\Backend\CourseController;
use App\Http\Controllers\Backend\TeacherController;
use App\Http\Controllers\Backend\ScheduleController;
use App\Http\Controllers\Backend\ReportController;
use App\Http\Controllers\Backend\SettingController;

// Admin Auth Controller
use App\Http\Controllers\Backend\UserController as AdminAuthController; // using same UserController for admin login/logout

/*
|--------------------------------------------------------------------------
| Frontend Routes
|--------------------------------------------------------------------------
*/
Route::get('/', [HomeController::class, 'index'])->name('frontend.home');
Route::get('/about', [AboutController::class, 'index'])->name('frontend.about');
Route::get('/contact', [ContactController::class, 'index'])->name('frontend.contact');

/*
|--------------------------------------------------------------------------
| Admin Authentication Routes (Public)
|--------------------------------------------------------------------------
*/
Route::prefix('admin')->group(function () {
    // Login
    Route::get('/login', [AdminAuthController::class, 'showLoginForm'])->name('admin.login');
    Route::post('/login', [AdminAuthController::class, 'login'])->name('admin.login.submit');

    // Logout
    Route::post('/logout', [AdminAuthController::class, 'logout'])->name('admin.logout');
});

/*
|--------------------------------------------------------------------------
| Admin Protected Routes (Requires Middleware)
|--------------------------------------------------------------------------
*/
Route::prefix('admin')->name('admin.')->middleware(['auth:admin'])->group(function () {
    // Dashboard
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    // Resource Controllers (CRUD)
    Route::resources([
        'users' => UserController::class,
        'students' => StudentController::class,
        'courses' => CourseController::class,
        'teachers' => TeacherController::class,
        'settings' => SettingController::class,
        'reports' => ReportController::class,
        'schedule' => ScheduleController::class,
    ]);
});
