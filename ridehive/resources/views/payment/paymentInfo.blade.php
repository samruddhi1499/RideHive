@extends('layouts.app')

@section('title', 'Payment Information')

@section('content')
<div class="container mx-auto py-12">
    <div class="bg-white p-8 rounded-lg shadow-lg max-w-2xl mx-auto">
        <h1 class="text-3xl font-semibold text-[#e75480] mb-6 text-center">Payment Information</h1>

        <form action="{{ route('stripe') }}" method="post">
            @csrf
            <!-- Ride Data from Step 1 -->
            <div class="space-y-6">
                <div>
                    <label for="pickup_location" class="block text-lg font-medium text-gray-700">Pickup Location</label>
                    <input type="text" id="pickup_location" name="pickup_location" class="mt-2 w-full p-4 border rounded-lg focus:ring-[#e75480]" value="{{ session('pickup_location', 'Default Location') }}" readonly>

                </div>
                <div>
                    <label for="dropoff_location" class="block text-lg font-medium text-gray-700">Dropoff Location</label>
                    <input type="text" id="dropoff_location" name="dropoff_location" class="mt-2 w-full p-4 border rounded-lg focus:ring-[#e75480]"  value="{{ session('dropoff_location', 'Default Location') }}"  readonly>
                </div>
                <div>
                    <label for="product_name" class="block text-lg font-medium text-gray-700">Product name</label>
                    <input type="text" id="product_name" name="product_name" class="mt-2 w-full p-4 border rounded-lg focus:ring-[#e75480]"  value="{{ session('vehicle_model', '') }}"  readonly>
                </div>
                <div class="flex space-x-4">
                    <div class="w-1/2">
                        <label for="start_date" class="block text-lg font-medium text-gray-700">Start Date</label>
                        <input type="date" id="start_date" name="start_date" class="mt-2 w-full p-4 border rounded-lg focus:ring-[#e75480]" value="{{ session('start_date', '') }}" readonly>
                    </div>
                    <div class="w-1/2">
                        <label for="end_date" class="block text-lg font-medium text-gray-700">End Date</label>
                        <input type="date" id="end_date" name="end_date" class="mt-2 w-full p-4 border rounded-lg focus:ring-[#e75480]" value="{{ session('end_date', '') }}"readonly>
                    </div>

                    <input type="hidden"  hidden name="payment_date" value="{{ date('Y-m-d') }}">

                    
                </div>
            </div>

            <!-- Payment Info Section -->
            <div class="mt-8 space-y-4">
                <div>
                    <label for="price" class="block text-lg font-medium text-gray-700">Total Cost</label>
                    <input type="text" id="price" name="price" class="mt-2 w-full p-4 border rounded-lg focus:ring-[#e75480]" value="{{ session('price', '') }}" readonly>
                </div>
                <div>
                    <label for="payment_method" class="block text-lg font-medium text-gray-700">Payment Method</label>
                    <input type="text" id="payment_method" name="payment_method" class="mt-2 w-full p-4 border rounded-lg focus:ring-[#e75480]" value="Credit Card" readonly>
                </div>
            </div>

            <!-- Submit Button -->
            <div class="mt-8 text-center">
                <button type="submit" class="px-8 w-2/5 py-3 bg-[#e75480] text-white font-semibold rounded hover:bg-gray-700 transition-colors">Submit</button>
            </div>
        </form>
    </div>
</div>
@endsection
