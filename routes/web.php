<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

// Landing Page
Route::get('/', function () {
    return view('landingpage');
})->name('landingpage');

// Auth Routes
Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login']);

Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
Route::post('/register', [AuthController::class, 'register']);

Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

// Dashboard Teacher
Route::get('/teacher', function () {
    $user = session('user');
    return view('pages.teacher', compact('user'));
})->middleware(['checkLogin', 'role:teacher'])->name('dashboard.teacher');

// Dashboard Student
Route::get('/student', function () {
    $user = session('user');
    return view('pages.student', compact('user'));
})->middleware(['checkLogin', 'role:student'])->name('dashboard.student');
