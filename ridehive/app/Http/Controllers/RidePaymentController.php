<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Payment;
use App\Models\Booking;
use App\Models\Availability;

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

    public function stripe(Request $request)
    {
        $stripe = new \Stripe\StripeClient(config('stripe.stripe_sk'));
        $response = $stripe->checkout->sessions->create([
            'line_items' => [[
                'price_data' => [
                    'currency' => 'cad',
                    'product_data' => [
                        'name' => $request->product_name, // Allowed field
                    ],
                    'unit_amount' => $request->price * 100, // Convert to cents
                ],
                'quantity' => 1,
            ]],
            'mode' => 'payment',
            'success_url' => route('paymentConfirmation') . '?session_id={CHECKOUT_SESSION_ID}',
            'cancel_url' => 'http://localhost:8000/payment/cancel',
            'metadata' => [
                'pickup_location' => $request->pickup_location,
                'dropoff_location' => $request->dropoff_location,
                'start_date' => $request->start_date,
                'end_date' => $request->end_date,
                'payment_method' => $request->payment_method,
                'payment_date' => $request->payment_date,
            ],
        ]);
    
        if (isset($response->id) && $response->id != '') {
            session()->put('product_name', $request->product_name);
            session()->put('price', $request->price);
            session()->put('pickup_location', $request->pickup_location);
            session()->put('dropoff_location', $request->dropoff_location);
            session()->put('start_date', $request->start_date);
            session()->put('end_date', $request->end_date);
            session()->put('paymentMethod', $request->payment_method);
            session()->put('paymentDate', $request->payment_date);
            session()->put('vehicle_id', 1);
            session()->put('status', "Successful");
            return redirect($response->url);

        } else {
            return redirect()->route('welcome');
        }
    }
    



    

    // Step 3: Handle the form submission
   
    // Step 3: Handle the form submission
    public function submitRide(Request $request)
{
    if (isset($request->session_id)) {
        $stripe = new \Stripe\StripeClient(config('stripe.stripe_sk'));
        $response = $stripe->checkout->sessions->retrieve($request->session_id);

        // Step 1: Save Booking
        $booking = new Booking();
        $booking->user_id = session()->get('user_id');
        $booking->vehicle_id = session()->get('vehicle_id');
        $booking->pickup_location = session()->get('pickup_location');
        $booking->dropoff_location = session()->get('dropoff_location');
        $booking->start_date = session()->get('start_date');
        $booking->end_date = session()->get('end_date');
        $booking->total_cost = session()->get('price');
        $booking->payment_status = "Paid";
        $booking->save();

        // Step 2: Save Payment (with foreign key to Booking)
        $payment = new Payment();
        $payment->booking_id = $booking->booking_id; // Use the ID of the saved Booking as the foreign key
        $payment->user_id = session()->get('user_id');
        $payment->amount = session()->get('price');
        $payment->payment_method = session()->get('paymentMethod');
        $payment->payment_date = session()->get('paymentDate');
        $payment->status = session()->get('status');
        $payment->save();

        // Step 3: Save Availability
        $availability = new Availability();
        $availability->booking_id = $booking->booking_id; 
        $availability->vehicle_id = session()->get('vehicle_id');
        $availability->start_date = session()->get('start_date');
        $availability->end_date = session()->get('end_date');
        $availability->status = "Booked";
        $availability->save();

        // Clear session variables and redirect to confirmation
        session()->forget('product_name');
        session()->forget('quantity');
        session()->forget('price');

        return view('payment.paymentConfirmation');
    } else {
        return redirect()->route('welcome');
    }
}

}


