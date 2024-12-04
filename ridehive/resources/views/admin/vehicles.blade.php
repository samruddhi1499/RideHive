@extends('admin.admin-dashboard')

@section('admin-content')
<h2 class="text-2xl font-semibold mb-6">Manage Vehicles</h2>

<!-- Vehicles Table -->
<div class="bg-white p-6 rounded-lg shadow">
    <h3 class="text-lg font-semibold mb-4 text-[#e75480]">Vehicles List</h3>
    <table class="w-full border-collapse">
        <thead class="bg-gray-100 text-left">
            <tr>
                <th class="py-2 px-4">ID</th>
                <th class="py-2 px-4">Model</th>
                <th class="py-2 px-4">Type</th>
                <th class="py-2 px-4">Price Per Day</th>
                <th class="py-2 px-4">Image</th>
                <th class="py-2 px-4">Status</th>
                <th class="py-2 px-4">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($vehicles as $vehicle)
                <tr class="border-t {{ $loop->odd ? 'bg-gray-50' : '' }}">
                    <td class="py-2 px-4">{{ $vehicle->vehicle_id }}</td>
                    <td class="py-2 px-4">{{ $vehicle->model }}</td>
                    <td class="py-2 px-4">{{ $vehicle->type }}</td>
                    <td class="py-2 px-4">${{ number_format($vehicle->price_per_day, 2) }}</td>
                    <td class="py-2 px-4">
    @if($vehicle->image)
        <img src="data:image/jpeg;base64,{{ base64_encode($vehicle->image) }}" alt="{{ $vehicle->model }}" class="w-20 h-20 object-cover rounded">
    @else
        <span class="text-gray-500">No Image</span>
    @endif
</td>
                    <td class="py-2 px-4">
                        <span class="{{ $vehicle->status == 'Available' ? 'text-green-500' : 'text-red-500' }}">
                            {{ $vehicle->status }}
                        </span>
                    </td>
                    <td class="py-2 px-4 flex space-x-4">
                        <!-- Approve Button -->
                        <form action="{{ route('admin.vehicles.approve', $vehicle->vehicle_id) }}" method="POST">
                            @csrf
                            <button class="text-[#e75480] border border-[#e75480] rounded px-4 py-1 hover:bg-[#e75480] hover:text-white">
                                Approve
                            </button>
                        </form>

                        <!-- Decline Button -->
                        <form action="{{ route('admin.vehicles.decline', $vehicle->vehicle_id) }}" method="POST">
                            @csrf
                            <button class="text-red-500 border border-red-500 rounded px-4 py-1 hover:bg-red-500 hover:text-white">
                                Decline
                            </button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
