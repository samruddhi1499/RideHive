<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\RidePaymentController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AdminVehicleController;
use App\Http\Controllers\VehicleController;



// Display the Welcome Page
Route::get('/', function () {
    
    return view('welcome');
});

// // Display Login Page
// Route::get('login', [AuthController::class, 'showLoginForm'])->name('login');

// // Handle Login Form Submission
// Route::post('login', [AuthController::class, 'login']);

Route::get('login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('login', [AuthController::class, 'login'])->name('login.post');

// Display Register Page
Route::get('register', [AuthController::class, 'showRegistrationForm'])->name('register');

// Handle Register Form Submission
Route::post('register', [AuthController::class, 'register']);

// Step 1 - Vehicle List
Route::get('vehicles', [RidePaymentController::class, 'showAllVehicles'])->name('vehicles');







Route::prefix('user')->group(function () {

    
// Step 2 - Ride Info Form
Route::get('ride-info', [RidePaymentController::class, 'showRideInfoForm'])->name('rideInfo');
//Route::get('ride-info', [RidePaymentController::class, 'showRideInfoForm'])->name('rideInfo');

// Step 3 - Payment Details Form
Route::post('payment-info', [RidePaymentController::class, 'showPaymentForm'])->name('paymentInfo');
//Route::get('payment-info', [RidePaymentController::class, 'showPaymentForm'])->name('paymentInfo');

Route::post('stripe', [RidePaymentController::class, 'stripe'])->name('stripe');

// Step 4 - Confirmation and Payment

Route::get('paymentConfirmation', [RidePaymentController::class, 'submitRide'])->name('paymentConfirmation');
//Route::post('paymentConfirmation', [RidePaymentController::class, 'submitRide'])->name('paymentConfirmation');

});






















Route::prefix('admin')->group(function () {

    Route::get('/users', [AdminController::class, 'showUsers'])->name('admin.users');
    Route::delete('/users/{user}', [AdminController::class, 'deleteUser'])->name('admin.users.delete');
    Route::get('/transactions', [AdminController::class, 'showTransactions'])->name('admin.transactions');
    
    Route::get('/vendors', [AdminController::class, 'showVendors'])->name('admin.vendors');
    Route::post('/vendors', [AdminController::class, 'storeVendor'])->name('admin.vendors.store'); // Add this
    Route::delete('/vendors/{user}', [AdminController::class, 'destroyVendor'])->name('admin.vendors.destroy'); 
    Route::get('/vendors/{user}/edit', [AdminController::class, 'editVendor'])->name('admin.vendors.edit'); // Edit Route
    Route::put('/vendors/{user}', [AdminController::class, 'updateVendor'])->name('admin.vendors.update'); // Update Route
    
    
    Route::get('/vehicles', [AdminVehicleController::class, 'index'])->name('admin.vehicles');
    Route::post('/vehicles/{vehicle_id}/approve', [AdminVehicleController::class, 'approve'])->name('admin.vehicles.approve');
    Route::post('/vehicles/{vehicle_id}/decline', [AdminVehicleController::class, 'decline'])->name('admin.vehicles.decline');


   

    // Route::get('/users', function () {
    //     return view('admin.view-users');
    // })->name('admin.users');

    // Route::get('/vendors', function () {
    //     return view('admin.vendors');
    // })->name('admin.vendors');

    // Route::get('/vehicles', function () {
    //     return view('admin.vehicles');
    // })->name('admin.vehicles');

    Route::get('/bookings', function () {
        return view('admin.bookings');
    })->name('admin.bookings');
    
    // Route::get('/transactions', function () {
    //     return view('admin.transaction-history');
    // })->name('admin.transactions');




   

    // Add routes for other admin pages later
});

Route::middleware('auth')->group(function () {
    Route::prefix('dashboard')->group(function () {
        Route::get('/', [DashboardController::class, 'index'])->name('dashboard.index');
        Route::get('/history', [DashboardController::class, 'history'])->name('dashboard.history');
        Route::get('/dashboard/reservation', [DashboardController::class, 'reservation'])->name('dashboard.reservation');
        Route::get('/vehicles', [VehicleController::class, 'index'])->name('vehicles');
    });
});
Route::get('/vehicles', [VehicleController::class, 'index'])->name('vehicles');

Route::prefix('vendor')->group(function () {

    // Reservations Page
    Route::get('/reservations', [VehicleController::class, 'reservations'])->name('vendor-role.reservations');

    // Booking History Page
    Route::get('/booking-history', [VehicleController::class, 'bookingHistory'])->name('vendor-role.bookingHistory');

    // List Vehicles
    Route::get('/vehicles', [VehicleController::class, 'index'])->name('vendor-role.vehicles');

    // Add New Vehicle
    Route::get('/vehicles/create', [VehicleController::class, 'create'])->name('vendor-role.vehicles.create');
    Route::post('/vehicles', [VehicleController::class, 'store'])->name('vendor-role.vehicles.store');

    // Edit Vehicle
    Route::get('vehicles/{vehicle}/edit', [VehicleController::class, 'edit'])->name('vendor-role.vehicles.edit');
    Route::put('/vehicles/{vehicle}', [VehicleController::class, 'update'])->name('vendor-role.vehicles.update');

    // Delete Vehicle
    Route::delete('/vehicles/{vehicle}', [VehicleController::class, 'destroy'])->name('vendor-role.vehicles.destroy');

    // View Specific Reservation
    Route::get('/reservations/{reservation}', [VehicleController::class, 'viewReservation'])->name('vendor-role.reservations.view');

    // Profile Page (Optional)
});
