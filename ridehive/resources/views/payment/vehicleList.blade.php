@extends('dashboard.dashboard')

@section('dashboard-content')
<h2 class="text-4xl font-bold text-center text-[#e75480] mb-6">Vehicles</h2>

<!-- Vehicles Grid -->
<div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
    @foreach($vehicles as $vehicle)
        <div class="bg-white p-4 rounded-lg shadow">
            <div class="w-full h-48 overflow-hidden rounded-lg mb-4">
                @if($vehicle->image)
                    <img src="data:image/jpeg;base64,{{ base64_encode($vehicle->image) }}" 
                         alt="{{ $vehicle->model }}" 
                         class="w-full h-full object-cover">
                @else
                    <img src="/placeholder.jpg" alt="No Image Available" class="w-full h-full object-cover">
                @endif
            </div>
            <h3 class="text-lg font-semibold text-[#e75480] mb-2">{{ $vehicle->model }}</h3>
            <p class="text-gray-600"><strong>Type:</strong> {{ ucfirst($vehicle->type) }}</p>
            <p class="text-gray-600"><strong>Price/Day:</strong> ${{ number_format($vehicle->price_per_day, 2) }}</p>
            <p class="text-gray-600"><strong>Status:</strong> 
                <span class="{{ $vehicle->status === 'Available' ? 'text-green-500' : 'text-yellow-500' }}">
                    {{ $vehicle->status }}
                </span>
            </p>
            <div class="mt-4 flex space-x-2">
            <a href="{{ route('rideInfo', ['id' => $vehicle->vehicle_id]) }}" 
   class="text-[#e75480] border border-[#e75480] rounded px-4 py-1 hover:bg-[#e75480] hover:text-white">
    Book
</a>
        
            </div>
        </div>
    @endforeach
</div>
@endsection
