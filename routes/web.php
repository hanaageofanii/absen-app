<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AttendanceController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\FeedbackController;
use App\Http\Controllers\LetterController;
use App\Http\Controllers\CompanyController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

// Auth Routes
Route::get('/login', [AuthController::class, 'loginPage'])->name('login');
Route::get('/register', [AuthController::class, 'registerPage'])->name('register');
Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'loginProcess']);
Route::get('/logout', [AuthController::class, 'logout']);

// Dashboard Routes
Route::get('/admin', [AuthController::class, 'adminDashboard']);
Route::get('/dashboard', [AuthController::class, 'userDashboard']);

// Redirect root to login
Route::get('/', function () {
    if(session('login')) {
        return session('role') == 'admin'
            ? redirect('/admin')
            : redirect('/dashboard');
    }
    return redirect('/login');
});

/*
|--------------------------------------------------------------------------
| API Routes (dalam web.php karena menggunakan session)
|--------------------------------------------------------------------------
*/

// Attendance API
Route::post('/api/attendance/clock-in', [AttendanceController::class, 'clockIn']);
Route::post('/api/attendance/clock-out', [AttendanceController::class, 'clockOut']);
Route::get('/api/attendance/history', [AttendanceController::class, 'history']);

// Reports API
Route::post('/api/reports', [ReportController::class, 'store']);
Route::get('/api/reports', [ReportController::class, 'index']);

// Feedback API
Route::post('/api/feedbacks', [FeedbackController::class, 'store']);
Route::get('/api/feedbacks', [FeedbackController::class, 'index']);

// Letters API
Route::post('/api/letters', [LetterController::class, 'store']);
Route::get('/api/letters', [LetterController::class, 'index']);

// Companies API
Route::get('/api/companies', [CompanyController::class, 'index']);
