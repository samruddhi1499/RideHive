<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;

class RidePaymentController extends Controller
{
    // Step 1: Show the ride info form
    public function showAllVehicles()
    {
        return view('payment.vehicleList');
    }

    public function showRideInfoForm()
    {
        return view('payment.rideInfo');
    }

    // Step 2: Show payment info form
    public function showPaymentForm(Request $request)
    {
        // Retrieve data from the session
        //$rideData = session('rideData');

        return view('payment.paymentInfo');
    }

    // Step 3: Handle the form submission
    public function submitRide(Request $request)
    {

        // Redirect to confirmation page (or any success page)
        return view('payment.paymentConfirmation');
    }
}
