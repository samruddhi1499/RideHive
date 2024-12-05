@extends('layouts.app')

@section('title', 'Rental Dashboard')

@section('content')
<div class="flex min-h-screen bg-gray-100">
    <!-- Sidebar -->
    <aside class="w-1/5 bg-[#e75480] p-6 shadow-md border-r border-gray-200 flex flex-col justify-between">
        <nav class="space-y-6 mt-8">
        <a href="{{ route('dashboard.index') }}" class="flex items-center text-white hover:text-gray-200 font-medium">
                <span class="material-icons">dashboard</span>
                <span class="ml-2">Dashboard</span>
            </a>
            <a href="{{ route('payment.vehicleList') }}" class="flex items-center text-white hover:text-gray-200 font-medium">
                <span class="material-icons">directions_bike</span>
                <span class="ml-2">Book Ride</span>
            </a>
            <a href="{{ route('dashboard.history') }}" class="flex items-center text-white hover:text-gray-200 font-medium">
                <span class="material-icons">history</span>
                <span class="ml-2">Booking History</span>
            </a>
            <a href="{{ route('dashboard.reservation') }}" class="flex items-center text-white hover:text-gray-200 font-medium">
                <span class="material-icons">event</span>
                <span class="ml-2">Payment History</span>
            </a>
        </nav>
    </aside>

    <!-- Main Content -->
    <main class="flex-1 p-8">
    @hasSection('dashboard-content')
            @yield('dashboard-content')
        @else
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-6 mb-8">
        <!-- Total Available Vehicles -->
        <div class="bg-green-100 p-6 rounded-lg shadow-md flex items-center justify-between">
            <div>
                <h2 class="text-lg font-semibold text-gray-600">Total Available Vehicles</h2>
                <p class="text-3xl font-bold text-gray-800 mt-2">{{ $totalAvailableVehicles }}</p>
            </div>
            <span class="material-icons text-green-500 text-4xl">directions_car</span>
        </div>

        <!-- Total Bookings for User -->
        <div class="bg-yellow-100 p-6 rounded-lg shadow-md flex items-center justify-between">
            <div>
                <h2 class="text-lg font-semibold text-gray-600">Total Bookings</h2>
                <p class="text-3xl font-bold text-gray-800 mt-2">{{ $totalBookings }}</p>
            </div>
            <span class="material-icons text-yellow-500 text-4xl">calendar_today</span>
        </div>

        <!-- Total Payments for User -->
        <div class="bg-blue-100 p-6 rounded-lg shadow-md flex items-center justify-between">
            <div>
                <h2 class="text-lg font-semibold text-gray-600">Total Payments</h2>
                <p class="text-3xl font-bold text-gray-800 mt-2">${{ number_format($totalPayments, 2) }}</p>
            </div>
            <span class="material-icons text-blue-500 text-4xl">account_balance_wallet</span>
        </div>
    </div>

            <!-- Property Locations -->
<div class="bg-white p-6 rounded-lg shadow mb-8 mt-6">
    <h2 class="text-lg font-semibold text-gray-600 mb-4">Rental Locations</h2>
    <div class="w-full h-80 rounded overflow-hidden mb-6">
        <!-- Embed a Map Placeholder -->
        <iframe 
            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3151.8354345093714!2d144.95373531569716!3d-37.816279742651024!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x6ad642af0f11fd81%3A0xf5776f15f2a9c88e!2sMelbourne%20VIC%2C%20Australia!5e0!3m2!1sen!2sus!4v1638255502331!5m2!1sen!2sus" 
            width="100%" 
            height="100%" 
            style="border:0;" 
            allowfullscreen="" 
            loading="lazy">
        </iframe>
    </div>
    

        </div>
        @endif
    </main>
</div>

@endsection
