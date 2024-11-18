@extends('layouts.app')

@section('title', 'Vehicle List')

@section('content')
<h2 class="text-4xl font-bold text-center text-[#e75480] mb-6">Vehicles</h2>

<!-- Vehicles Grid -->
<div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
    <!-- Vehicle Card Example -->
    <div class="bg-white p-4 rounded-lg shadow">
        <div class="w-full h-48 overflow-hidden rounded-lg mb-4">
            <img src="/scooter2.jpg" alt="Scooter X1" class="w-full h-full object-cover">
        </div>
        <h3 class="text-lg font-semibold text-[#e75480] mb-2">Scooter X1</h3>
        <p class="text-gray-600"><strong>Type:</strong> Scooter</p>
        <p class="text-gray-600"><strong>Registration:</strong> AB12345</p>
        <p class="text-gray-600"><strong>Status:</strong> <span class="text-green-500">Available</span></p>
        <div class="mt-4 flex space-x-2">
            <a href="{{ route('rideInfo', ['id' => 1]) }}" 
               class="text-[#e75480] border border-[#e75480] rounded px-4 py-1 hover:bg-[#e75480] hover:text-white">
                Book
            </a>        
        </div>
    </div>

    <div class="bg-white p-4 rounded-lg shadow">
        <div class="w-full h-48 overflow-hidden rounded-lg mb-4">
            <img src="/white-cycle.jpg" alt="Bike Y2" class="w-full h-full object-cover">
        </div>
        <h3 class="text-lg font-semibold text-[#e75480] mb-2">Bike Y2</h3>
        <p class="text-gray-600"><strong>Type:</strong> Bike</p>
        <p class="text-gray-600"><strong>Registration:</strong> CD67890</p>
        <p class="text-gray-600"><strong>Status:</strong> <span class="text-yellow-500">Unavailable</span></p>
        <div class="mt-4 flex space-x-2">
            <a href="{{ route('rideInfo', ['id' => 2]) }}" 
               class="text-[#e75480] border border-[#e75480] rounded px-4 py-1 hover:bg-[#e75480] hover:text-white">
                Book
            </a>        
        </div>
    </div>

    <!-- Additional Cards -->
    <div class="bg-white p-4 rounded-lg shadow">
        <div class="w-full h-48 overflow-hidden rounded-lg mb-4">
            <img src="scooter1.jpg" alt="Sports Bike Z3" class="w-full h-full object-cover">
        </div>
        <h3 class="text-lg font-semibold text-[#e75480] mb-2">Sports Bike Z3</h3>
        <p class="text-gray-600"><strong>Type:</strong> Bike</p>
        <p class="text-gray-600"><strong>Registration:</strong> EF12345</p>
        <p class="text-gray-600"><strong>Status:</strong> <span class="text-green-500">Available</span></p>
        <div class="mt-4 flex space-x-2">
            <a href="{{ route('rideInfo', ['id' => 3]) }}" 
               class="text-[#e75480] border border-[#e75480] rounded px-4 py-1 hover:bg-[#e75480] hover:text-white">
                Book
            </a>        
        </div>
    </div>

    <div class="bg-white p-4 rounded-lg shadow">
        <div class="w-full h-48 overflow-hidden rounded-lg mb-4">
            <img src="scooter3.jpg" alt="Electric Scooter M1" class="w-full h-full object-cover">
        </div>
        <h3 class="text-lg font-semibold text-[#e75480] mb-2">Electric Scooter M1</h3>
        <p class="text-gray-600"><strong>Type:</strong> Scooter</p>
        <p class="text-gray-600"><strong>Registration:</strong> GH67890</p>
        <p class="text-gray-600"><strong>Status:</strong> <span class="text-yellow-500">Unavailable</span></p>
        <div class="mt-4 flex space-x-2">
            <a href="{{ route('rideInfo', ['id' => 4]) }}" 
               class="text-[#e75480] border border-[#e75480] rounded px-4 py-1 hover:bg-[#e75480] hover:text-white">
                Book
            </a>        
        </div>
    </div>

    <div class="bg-white p-4 rounded-lg shadow">
        <div class="w-full h-48 overflow-hidden rounded-lg mb-4">
            <img src="cycle2.jpg" alt="Cruiser Bike R7" class="w-full h-full object-cover">
        </div>
        <h3 class="text-lg font-semibold text-[#e75480] mb-2">Cruiser Bike R7</h3>
        <p class="text-gray-600"><strong>Type:</strong> Bike</p>
        <p class="text-gray-600"><strong>Registration:</strong> IJ34567</p>
        <p class="text-gray-600"><strong>Status:</strong> <span class="text-green-500">Available</span></p>
        <div class="mt-4 flex space-x-2">
            <a href="{{ route('rideInfo', ['id' => 5]) }}" 
               class="text-[#e75480] border border-[#e75480] rounded px-4 py-1 hover:bg-[#e75480] hover:text-white">
                Book
            </a>        
        </div>
    </div>

    <div class="bg-white p-4 rounded-lg shadow">
        <div class="w-full h-48 overflow-hidden rounded-lg mb-4">
            <img src="scooter2.jpg" alt="Mountain Bike Q8" class="w-full h-full object-cover">
        </div>
        <h3 class="text-lg font-semibold text-[#e75480] mb-2">Mountain Bike Q8</h3>
        <p class="text-gray-600"><strong>Type:</strong> Bike</p>
        <p class="text-gray-600"><strong>Registration:</strong> KL89012</p>
        <p class="text-gray-600"><strong>Status:</strong> <span class="text-yellow-500">Unavailable</span></p>
        <div class="mt-4 flex space-x-2">
            <a href="{{ route('rideInfo', ['id' => 6]) }}" 
               class="text-[#e75480] border border-[#e75480] rounded px-4 py-1 hover:bg-[#e75480] hover:text-white">
                Book
            </a>        
        </div>
    </div>
</div>
@endsection
