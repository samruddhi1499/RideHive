<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\RidePaymentController;
use App\Http\Controllers\DashboardController;

// Display the Welcome Page
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

// Step 1 - Ride Info Form
Route::get('ride-info', [RidePaymentController::class, 'showRideInfoForm'])->name('rideInfo');
//Route::get('ride-info', [RidePaymentController::class, 'showRideInfoForm'])->name('rideInfo');

// Step 2 - Payment Details Form
Route::get('payment-info', [RidePaymentController::class, 'showPaymentForm'])->name('paymentInfo');
//Route::get('payment-info', [RidePaymentController::class, 'showPaymentForm'])->name('paymentInfo');

// Step 3 - Confirmation and Payment
Route::get('paymentConfirmation', [RidePaymentController::class, 'submitRide'])->name('paymentConfirmation');
//Route::post('paymentConfirmation', [RidePaymentController::class, 'submitRide'])->name('paymentConfirmation');

Route::prefix('dashboard')->group(function () {
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard.index');
    Route::get('/history', [DashboardController::class, 'history'])->name('dashboard.history');
    Route::get('/reservation', [DashboardController::class, 'reservation'])->name('dashboard.reservation');
});

Route::prefix('admin')->group(function () {
    Route::get('/users', function () {
        return view('admin.view-users');
    })->name('admin.users');

    Route::get('/vendors', function () {
        return view('admin.vendors');
    })->name('admin.vendors');

    Route::get('/vehicles', function () {
        return view('admin.vehicles');
    })->name('admin.vehicles');

    Route::get('/bookings', function () {
        return view('admin.bookings');
    })->name('admin.bookings');
    
    Route::get('/transactions', function () {
        return view('admin.transaction-history');
    })->name('admin.transactions');
    

    // Add routes for other admin pages later
});
