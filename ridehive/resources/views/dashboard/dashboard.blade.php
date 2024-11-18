@extends('layouts.app')

@section('title', 'Rental Dashboard')

@section('content')
<div class="flex min-h-screen bg-gray-100">
    <!-- Sidebar -->
    <aside class="w-1/5 bg-[#e75480] p-6 shadow-md border-r border-gray-200 flex flex-col justify-between">
        <nav class="space-y-6 mt-8">
            <a href="{{ route('vehicles') }}" class="flex items-center text-white hover:text-gray-200 font-medium">
                <span class="material-icons">directions_bike</span>
                <span class="ml-2">Book</span>
            </a>
            <a href="{{ route('dashboard.history') }}" class="flex items-center text-white hover:text-gray-200 font-medium">
                <span class="material-icons">history</span>
                <span class="ml-2">Booking History</span>
            </a>
            <a href="{{ route('dashboard.reservation') }}" class="flex items-center text-white hover:text-gray-200 font-medium">
                <span class="material-icons">event</span>
                <span class="ml-2">Reservation</span>
            </a>
        </nav>
    </aside>

    <!-- Main Content -->
    <main class="flex-1 p-8">
    @hasSection('dashboard-content')
            @yield('dashboard-content')
        @else
        <div>
            <!-- Header -->
            <div class="flex justify-between items-center mb-6">
                <h1 class="text-3xl font-semibold text-[#e75480]">Rental Dashboard</h1>
            </div>

            <!-- Metric Cards -->
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-6 mb-8">
                <div class="bg-green-100 p-6 rounded-lg shadow-md flex items-center justify-between">
                    <div>
                        <h2 class="text-lg font-semibold text-gray-600">Revenue</h2>
                        <p class="text-3xl font-bold text-gray-800 mt-2">$1200.45</p>
                    </div>
                    <span class="material-icons text-green-500 text-4xl">bar_chart</span>
                </div>
                <div class="bg-yellow-100 p-6 rounded-lg shadow-md flex items-center justify-between">
                    <div>
                        <h2 class="text-lg font-semibold text-gray-600">Expenses</h2>
                        <p class="text-3xl font-bold text-gray-800 mt-2">$400</p>
                    </div>
                    <span class="material-icons text-yellow-500 text-4xl">pie_chart</span>
                </div>
                <div class="bg-blue-100 p-6 rounded-lg shadow-md flex items-center justify-between">
                    <div>
                        <h2 class="text-lg font-semibold text-gray-600">Reservations</h2>
                        <p class="text-3xl font-bold text-gray-800 mt-2">Pending</p>
                    </div>
                    <span class="material-icons text-blue-500 text-4xl">description</span>
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
    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
        <div class="bg-gray-100 p-4 rounded-lg shadow flex items-center space-x-4">
            <img src="/white-cycle.jpg" alt="Property" class="w-20 h-20 rounded">
            <div>
                <h3 class="text-lg font-semibold text-gray-800">Temple City, Thanjavur</h3>
                <p class="text-sm text-gray-600">Occupied</p>
                <p class="text-sm text-gray-600">$2500 / year</p>
            </div>
        </div>
        <div class="bg-gray-100 p-4 rounded-lg shadow flex items-center space-x-4">
            <img src="/cycle2.jpg" alt="Property" class="w-20 h-20 rounded">
            <div>
                <h3 class="text-lg font-semibold text-gray-800">Pearl Apartments</h3>
                <p class="text-sm text-gray-600">For Rent</p>
                <p class="text-sm text-gray-600">$3000 / year</p>
            </div>
        </div>
        <div class="bg-gray-100 p-4 rounded-lg shadow flex items-center space-x-4">
            <img src="/scooter1.jpg" alt="Property" class="w-20 h-20 rounded">
            <div>
                <h3 class="text-lg font-semibold text-gray-800">Pearl Apartments</h3>
                <p class="text-sm text-gray-600">For Rent</p>
                <p class="text-sm text-gray-600">$3000 / year</p>
            </div>
        </div>
        <div class="bg-gray-100 p-4 rounded-lg shadow flex items-center space-x-4">
            <img src="/scooter2.jpg" alt="Property" class="w-20 h-20 rounded">
            <div>
                <h3 class="text-lg font-semibold text-gray-800">Pearl Apartments</h3>
                <p class="text-sm text-gray-600">For Rent</p>
                <p class="text-sm text-gray-600">$3000 / year</p>
            </div>
        </div>
    </div>
</div>

        </div>
        @endif
    </main>
</div>

@endsection
