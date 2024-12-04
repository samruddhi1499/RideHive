<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Carbon;
use App\Models\Booking;
use App\Models\Payment;
use App\Models\Vehicle;

class DashboardController extends Controller
{
    public function index()
    {
        $userId = Auth::id();

    // Fetch metrics
    $totalAvailableVehicles = Vehicle::where('status', 'available')->count();
    $totalBookings = Booking::where('user_id', $userId)->count();
    $totalPayments = Payment::where('user_id', $userId)->where('status', 'Successful')->sum('amount');

    return view('dashboard.dashboard', [
        'totalAvailableVehicles' => $totalAvailableVehicles,
        'totalBookings' => $totalBookings,
        'totalPayments' => $totalPayments,
    ]);
       
    }

    public function book()
    {
        return view('dashboard.book');
    }
    
    public function history()
    {
        $userId = Auth::id();
    
        $bookings = Booking::with('vehicle')
            ->where('user_id', $userId)
            ->get()
            ->map(function ($booking) {
                // Manually convert string dates to Carbon instances
                $booking->start_date = Carbon::parse($booking->start_date);
                $booking->end_date = Carbon::parse($booking->end_date);
                return $booking;
            });
    
        return view('dashboard.history', [
            'bookings' => $bookings,
            'total' => $bookings->count(),
            'completed' => $bookings->where('payment_status', 'Paid')->count(),
            'pending' => $bookings->where('payment_status', 'Pending')->count(),
        ]);
    }


    public function reservation()
{
    $userId = Auth::id(); // Get the logged-in user's ID

    // Fetch reservations (bookings) with related vehicle details
    $reservations = Booking::with('vehicle')
        ->where('user_id', $userId)
        ->get()
        ->map(function ($reservation) {
            // Parse date fields to Carbon instances for formatting
            $reservation->start_date = \Carbon\Carbon::parse($reservation->start_date);
            $reservation->end_date = \Carbon\Carbon::parse($reservation->end_date);
            return $reservation;
        });

    // Fetch payment history for the user
    $payments = Payment::where('user_id', $userId)
        ->orderBy('payment_date', 'desc')
        ->get()
        ->map(function ($payment) {
            // Parse payment_date to Carbon instance for formatting
            $payment->payment_date = \Carbon\Carbon::parse($payment->payment_date);
            return $payment;
        });

    // Return the reservation view with both reservations and payments
    return view('dashboard.reservation', [
        'reservations' => $reservations,
        'payments' => $payments
    ]);
}
    
}
