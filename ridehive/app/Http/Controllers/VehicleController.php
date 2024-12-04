<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Vehicle;

class VehicleController extends Controller
{
    public function index()
    {
        // Fetch all vehicles
        $vehicles = Vehicle::all();

        // Pass the vehicles data to the view
        return view('payment.vehicleList', compact('vehicles'));
    }
}
