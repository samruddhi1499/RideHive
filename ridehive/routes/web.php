<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

Route::get('/', function () {
    return view('welcome');
});


// Display Login Page
Route::get('login', [AuthController::class, 'showLoginForm'])->name('login');

// Handle Login Form Submission
Route::post('login', [AuthController::class, 'login']);

// Display Register Page
Route::get('register', [AuthController::class, 'showRegistrationForm'])->name('register');

// Handle Register Form Submission
Route::post('register', [AuthController::class, 'register']);

