@extends('layouts.app')

@section('title', 'Ride Information')

@section('content')
<div class="container mx-auto py-12">
    <div class="bg-white p-8 rounded-lg shadow-lg max-w-2xl mx-auto">
        <h1 class="text-3xl font-semibold text-[#e75480] mb-6 text-center">Ride Information</h1>

        <form action="{{ route('storeRideData', ['vehicle_id' => $vehicle_id]) }}" method="POST">
   
            @csrf
            <!-- Booking Information -->
            <div class="space-y-6">
                <div>
                    <label for="pickup_location" class="block text-lg font-medium text-gray-700">Pickup Location</label>
                    <input type="text" id="pickup_location" name="pickup_location" class="mt-2 w-full p-4 border rounded-lg focus:ring-[#e75480]" placeholder="Enter pickup location" required>
                </div>
                <div>
                    <label for="dropoff_location" class="block text-lg font-medium text-gray-700">Dropoff Location</label>
                    <input type="text" id="dropoff_location" name="dropoff_location" class="mt-2 w-full p-4 border rounded-lg focus:ring-[#e75480]" placeholder="Enter dropoff location" required>
                </div>
                <div class="flex space-x-4">
                    <div class="w-1/2">
                        <label for="start_date" class="block text-lg font-medium text-gray-700">Start Date</label>
                        <input type="date" id="start_date" name="start_date" class="mt-2 w-full p-4 border rounded-lg focus:ring-[#e75480]" required>
                    </div>
                    <div class="w-1/2">
                        <label for="end_date" class="block text-lg font-medium text-gray-700">End Date</label>
                        <input type="date" id="end_date" name="end_date" class="mt-2 w-full p-4 border rounded-lg focus:ring-[#e75480]" required>
                    </div>
                </div>
            </div>

            <!-- Next Button -->
            <div class="mt-8 text-center">
                <button type="submit" class=" px-8 w-2/5 py-3 bg-[#e75480] text-white font-semibold rounded hover:bg-gray-700 transition-colors">Next</button>
            </div>
        </form>
    </div>
</div>
@endsection
