<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Vehicle;

class VehicleController extends Controller
{
    // Display the list of vehicles
    public function index()
    {
        $vehicles = Vehicle::all(); // Fetch all vehicles
        return view('vendor-role.vehicles', compact('vehicles')); // Render the vehicles view
    }

    public function store(Request $request)
    {
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
            'vendor_id' => 1, // Static or placeholder value for vendor_id
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
            'vehicle_name' => 'required|string|max:100',
            'vehicle_type' => 'required|in:Bike,Scooter',
            'price_per_day' => 'required|numeric|min:0',
            'status' => 'required|in:Available,Unavailable',
            'vehicle_image' => 'nullable|image|max:2048', // Image is optional
        ]);

        $vehicle = Vehicle::findOrFail($id);

        // Update image if provided
        if ($request->hasFile('vehicle_image')) {
            $imagePath = $request->file('vehicle_image')->store('vehicles', 'public');
            $vehicle->image = $imagePath;
        }

        // Update vehicle details
        $vehicle->update([
            'type' => ucfirst($request->vehicle_type),
            'model' => $request->vehicle_name,
            'price_per_day' => $request->price_per_day,
            'status' => ucfirst($request->status),
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
}
