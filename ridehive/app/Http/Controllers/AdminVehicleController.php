<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Vehicle;

class AdminVehicleController extends Controller
{
    // Display all vehicles
    public function index()
    {
        $vehicles = Vehicle::all();
        return view('admin.vehicles', compact('vehicles'));
    }

    // Approve a vehicle
    public function approve($vehicle_id)
    {
        $vehicle = Vehicle::findOrFail($vehicle_id); // Find vehicle by vehicle_id
        $vehicle->update(['status' => 'Available']);
        return redirect()->route('admin.vehicles')->with('success', 'Vehicle approved successfully.');
    }

    // Decline a vehicle
    public function decline($vehicle_id)
    {
        $vehicle = Vehicle::findOrFail($vehicle_id); // Find vehicle by vehicle_id
        $vehicle->update(['status' => 'Unavailable']);
        return redirect()->route('admin.vehicles')->with('error', 'Vehicle declined successfully.');
    }
}

