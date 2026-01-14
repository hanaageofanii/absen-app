<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

Route::get('/', fn() => redirect('/login'));

// LOGIN & REGISTER
Route::get('/login', [AuthController::class, 'loginPage']);
Route::post('/login', [AuthController::class, 'loginProcess']);

Route::get('/register', [AuthController::class, 'registerPage']);
Route::post('/register', [AuthController::class, 'register']);

// DASHBOARD
Route::get('/admin', [AuthController::class, 'adminDashboard']);  // akan load resources/views/admin/dashboard.blade.php
Route::get('/dashboard', [AuthController::class, 'userDashboard']); // akan load resources/views/user/dashboard.blade.php

// LOGOUT
Route::get('/logout', [AuthController::class, 'logout']);