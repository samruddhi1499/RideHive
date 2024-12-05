<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Vehicle;
use App\Models\Booking;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Log;


class VehicleController extends Controller
{
    // Display the list of vehicles
    public function index()
    {
        $vehicles = Vehicle::where('status', 'Available')->get();

        // Pass the vehicles to the view
        return view('payment.vehicleList', compact('vehicles'));// Render the vehicles view
    }

    public function showAllVehicles(Request $request)
{
    // Get the vendor ID from the session
    $vendorId = $request->session()->get('user_id'); 

    // Fetch vehicles for the specific vendor
    $vehicles = Vehicle::where('vendor_id', $vendorId)->get();

    // Render the vehicles view with the filtered data
    return view('vendor-role.vehicles', compact('vehicles'));
}


    public function store(Request $request)
    {
        Log::info('Reservations fetched for vendor ID ' . $request->session()->get('user_id'));
        $request->validate([
            'model' => 'required|string|max:100',
            'type' => 'required|in:Bike,Scooter',
            'price_per_day' => 'required|numeric|min:0',
            'status' => 'required|in:Available,Unavailable',
            'image' => 'nullable|image|max:2048', // Image is optional
        ]);

        // Read the image file as binary data
        $imageData = $request->hasFile('image')
            ? file_get_contents($request->file('image')->getRealPath())
            : null;

        // Create a new vehicle
        Vehicle::create([
            'vendor_id' => session('user_id'), // Static or placeholder value for vendor_id
            'type' => ucfirst($request->type),
            'model' => $request->model,
            'price_per_day' => $request->price_per_day,
            'status' => ucfirst($request->status),
            'image' => $imageData, // Store the binary data in the 'image' column
        ]);

        return redirect()->route('vendor-role.vehicles')->with('success', 'Vehicle added successfully.');
    }


    // Show the edit form for a vehicle
    public function edit(Vehicle $vehicle)
    {
        return view('vehicles.edit', compact('vehicle'));
    }

    // Update a vehicle
    public function update(Request $request, $id)
{
    $request->validate([
        'model' => 'required|string|max:100', // Aligning with the 'model' field in the Blade form
        'type' => 'required|in:Bike,Scooter', // Aligning with the 'type' field in the Blade form
        'price_per_day' => 'required|numeric|min:0', // Aligning with the 'price_per_day' field
        'status' => 'required|in:Available,Unavailable', // Aligning with the 'status' field
        'image' => 'nullable|image|max:2048', // Aligning with the 'image' field in the Blade form
    ]);

    $vehicle = Vehicle::findOrFail($id);

    // Update image if provided
    if ($request->hasFile('image')) {
        $imageData = file_get_contents($request->file('image')->getRealPath());
        $vehicle->image = $imageData; // Update image as BLOB
    }

    // Update vehicle details
    $vehicle->update([
        'model' => $request->model,
        'type' => $request->type,
        'price_per_day' => $request->price_per_day,
        'status' => $request->status,
    ]);

    return redirect()->route('vendor-role.vehicles')->with('success', 'Vehicle updated successfully.');
}


    // Delete a vehicle
    public function destroy($vehicleId)
    {
        $vehicle = Vehicle::findOrFail($vehicleId);
        $vehicle->delete();

        return redirect()->route('vendor-role.vehicles')->with('success', 'Vehicle deleted successfully.');
    }

    public function reservations($vendorId)
    {
        $currentDate = Carbon::now()->format('Y-m-d');

        // Query with filtering
        $reservations = Booking::whereHas('vehicle', function ($query) use ($vendorId) {
            $query->where('vendor_id', $vendorId); // Filter by vendor ID
        })
            ->where('end_date', '>=', $currentDate) // Filter by end_date >= current date
            ->get();
        Log::info('Reservations fetched for vendor ID ' . $vendorId, [
            'reservations' => $reservations->toArray(),
        ]);

        // Pass the filtered bookings to the view
        return view('vendor-role.reservations', compact('reservations'));
    }

    public function bookingHistory($vendorId)
    {
        // Query all bookings for vehicles belonging to the specified vendor
        $bookings = Booking::whereHas('vehicle', function ($query) use ($vendorId) {
            $query->where('vendor_id', $vendorId); // Filter by vendor ID
        })
            ->with(['vehicle', 'user']) // Eager load related vehicle and user details
            ->get();

        // Pass the bookings data to the view
        return view('vendor-role.bookingHistory', compact('bookings'));
    }




}
