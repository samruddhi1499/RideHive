@extends('vendor-role.vendorRole')

@section('vendor-content')
<h2 class="text-2xl font-semibold mb-6">Manage Vehicles</h2>

<!-- Flash Messages -->
@if (session('success'))
    <div class="bg-green-100 text-green-600 p-4 rounded mb-4">
        {{ session('success') }}
    </div>
@endif
@if (session('error'))
    <div class="bg-red-100 text-red-600 p-4 rounded mb-4">
        {{ session('error') }}
    </div>
@endif

<!-- Add Vehicle Form -->
<div class="bg-white p-6 rounded-lg shadow mb-8">
    <h3 class="text-lg font-semibold mb-4 text-[#e75480]">Add New Vehicle</h3>
    <form action="{{ route('vendor-role.vehicles.store') }}" method="POST" class="space-y-4"
        enctype="multipart/form-data">
        @csrf
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div>
                <label for="model" class="block text-gray-600">Model</label>
                <input type="text" id="model" name="model" class="border rounded w-full py-2 px-4 focus:ring-[#e75480]"
                    placeholder="Enter vehicle model" required>
            </div>
            <div>
                <label for="type" class="block text-gray-600">Type</label>
                <select id="type" name="type" class="border rounded w-full py-2 px-4 focus:ring-[#e75480]">
                    <option value="Bike">Bike</option>
                    <option value="Scooter">Scooter</option>
                </select>
            </div>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div>
                <label for="price_per_day" class="block text-gray-600">Price per Day</label>
                <input type="number" id="price_per_day" name="price_per_day"
                    class="border rounded w-full py-2 px-4 focus:ring-[#e75480]" placeholder="Enter price per day"
                    step="0.01" required>
            </div>
            <div>
                <label for="status" class="block text-gray-600">Status</label>
                <input type="texr" id="status" name="status"
                    class="border rounded w-full py-2 px-4 focus:ring-[#e75480]" value="Unavailable"
                    step="0.01" readonly>
            </div>
        </div>
        <div>
            <label for="image" class="block text-gray-600">Vehicle Image</label>
            <input type="file" id="image" name="image" class="border rounded w-full py-2 px-4 focus:ring-[#e75480]"
                accept="image/*" required>
        </div>
        <button type="submit" class="bg-[#e75480] text-white px-6 py-2 rounded hover:bg-gray-700">Add Vehicle</button>
    </form>
</div>

<!-- Vehicles Table -->
<div class="bg-white p-6 rounded-lg shadow">
    <h3 class="text-lg font-semibold mb-4 text-[#e75480]">Vehicles List</h3>
    <table class="w-full border-collapse">
        <thead class="bg-gray-100 text-left">
            <tr>
                <th class="py-2 px-4">ID</th>
                <th class="py-2 px-4">Model</th>
                <th class="py-2 px-4">Type</th>
                <th class="py-2 px-4">Price per Day</th>
                <th class="py-2 px-4">Status</th>
                <th class="py-2 px-4">Image</th>
                <th class="py-2 px-4">Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($vehicles as $vehicle)
                <tr class="border-t">
                    <td class="py-2 px-4">{{ $vehicle->vehicle_id }}</td>
                    <td class="py-2 px-4">{{ $vehicle->model }}</td>
                    <td class="py-2 px-4">{{ $vehicle->type }}</td>
                    <td class="py-2 px-4">${{ $vehicle->price_per_day }}</td>
                    <td class="py-2 px-4 {{ $vehicle->status === 'Available' ? 'text-green-500' : 'text-yellow-500' }}">
                        {{ $vehicle->status }}
                    </td>
                    <td class="py-2 px-4">
                        @if ($vehicle->image)
                            <img src="data:image/jpeg;base64,{{ base64_encode($vehicle->image) }}" alt="{{ $vehicle->model }}"
                                class="w-50 h-20 object-cover rounded">
                        @else
                            <span>No Image</span>
                        @endif
                    </td>
                    <td class="py-2 px-4 flex gap-2">
                        <button
                            class="text-[#e75480] border border-[#e75480] rounded px-4 py-1 hover:bg-[#e75480] hover:text-white"
                            onclick="toggleEditForm({{ $vehicle->vehicle_id }})">
                            Edit
                        </button>

                        <form action="{{ route('vendor-role.vehicles.destroy', $vehicle) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit"
                                class="flex items-center gap-2 text-red-600 border border-red-600 rounded px-4 py-2 font-semibold transition-all duration-200 hover:bg-red-500 hover:text-white hover:shadow-md focus:outline-none focus:ring-2 focus:ring-red-500">
                                Delete
                            </button>
                        </form>
                    </td>
                </tr>
                <!-- Inline Edit Form -->
                <tr id="edit-form-{{ $vehicle->vehicle_id }}" class="hidden">
                    <td colspan="7">
                        <form action="{{ route('vendor-role.vehicles.update', $vehicle->vehicle_id) }}" method="POST"
                            class="p-4 bg-gray-50 border rounded-lg space-y-4" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                <div>
                                    <label for="model-{{ $vehicle->vehicle_id }}" class="block text-gray-600">Model</label>
                                    <input type="text" id="model-{{ $vehicle->vehicle_id }}" name="model"
                                        class="border rounded w-full py-2 px-4 focus:ring-[#e75480]"
                                        value="{{ $vehicle->model }}" required>
                                </div>
                                <div>
                                    <label for="type-{{ $vehicle->vehicle_id }}" class="block text-gray-600">Type</label>
                                    <select id="type-{{ $vehicle->vehicle_id }}" name="type"
                                        class="border rounded w-full py-2 px-4 focus:ring-[#e75480]">
                                        <option value="Bike" {{ $vehicle->type == 'Bike' ? 'selected' : '' }}>Bike
                                        </option>
                                        <option value="Scooter" {{ $vehicle->type == 'Scooter' ? 'selected' : '' }}>
                                            Scooter</option>
                                    </select>
                                </div>
                            </div>
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                <div>
                                    <label for="price_per_day-{{ $vehicle->vehicle_id }}"
                                        class="block text-gray-600">Price per Day</label>
                                    <input type="number" id="price_per_day-{{ $vehicle->vehicle_id }}"
                                        name="price_per_day" class="border rounded w-full py-2 px-4 focus:ring-[#e75480]"
                                        step="0.01" value="{{ $vehicle->price_per_day }}" required>
                                </div>
                                <div>
                                    <label for="status-{{ $vehicle->vehicle_id }}" class="block text-gray-600">Status</label>
                                    <select id="status-{{ $vehicle->vehicle_id }}" name="status"
                                        class="border rounded w-full py-2 px-4 focus:ring-[#e75480]">
                                        <option value="Available" {{ $vehicle->status == 'Available' ? 'selected' : '' }}>
                                            Available</option>
                                        <option value="Unavailable"
                                            {{ $vehicle->status == 'Unavailable' ? 'selected' : '' }}>Unavailable
                                        </option>
                                    </select>
                                </div>
                            </div>
                            <div>
                                <label for="image-{{ $vehicle->vehicle_id }}" class="block text-gray-600">Vehicle Image</label>
                                <input type="file" id="image-{{ $vehicle->vehicle_id }}" name="image"
                                    class="border rounded w-full py-2 px-4 focus:ring-[#e75480]" accept="image/*">
                            </div>
                            <div class="flex space-x-4">
                                <button type="submit"
                                    class="bg-[#e75480] text-white px-6 py-2 rounded hover:bg-gray-700">Save</button>
                                <button type="button" class="bg-gray-500 text-white px-6 py-2 rounded hover:bg-gray-700"
                                    onclick="toggleEditForm({{ $vehicle->vehicle_id }})">Cancel</button>
                            </div>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="7" class="py-2 px-4 text-center">No vehicles found.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>

<script>
    function toggleEditForm(vehicleId) {
        const editForm = document.getElementById(`edit-form-${vehicleId}`);
        editForm.classList.toggle('hidden');
    }
</script>
@endsection
