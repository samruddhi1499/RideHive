@extends('admin.admin-dashboard')

@section('admin-content')
<h2 class="text-2xl font-semibold mb-6">Manage Vehicles</h2>

<!-- Add Vehicle Form -->
<div class="bg-white p-6 rounded-lg shadow mb-8">
    <h3 class="text-lg font-semibold mb-4 text-[#e75480]">Add New Vehicle</h3>
    <form action="#" method="POST" class="space-y-4">
        @csrf
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div>
                <label for="vehicle_name" class="block text-gray-600">Vehicle Name</label>
                <input type="text" id="vehicle_name" name="vehicle_name" class="border rounded w-full py-2 px-4 focus:ring-[#e75480]" placeholder="Enter vehicle name" required>
            </div>
            <div>
                <label for="vehicle_type" class="block text-gray-600">Vehicle Type</label>
                <select id="vehicle_type" name="vehicle_type" class="border rounded w-full py-2 px-4 focus:ring-[#e75480]">
                    <option value="bike">Bike</option>
                    <option value="scooter">Scooter</option>
                </select>
            </div>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div>
                <label for="registration_number" class="block text-gray-600">Registration Number</label>
                <input type="text" id="registration_number" name="registration_number" class="border rounded w-full py-2 px-4 focus:ring-[#e75480]" placeholder="Enter registration number" required>
            </div>
            <div>
                <label for="status" class="block text-gray-600">Status</label>
                <select id="status" name="status" class="border rounded w-full py-2 px-4 focus:ring-[#e75480]">
                    <option value="available">Available</option>
                    <option value="unavailable">Unavailable</option>
                </select>
            </div>
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
                <th class="py-2 px-4">Name</th>
                <th class="py-2 px-4">Type</th>
                <th class="py-2 px-4">Registration Number</th>
                <th class="py-2 px-4">Status</th>
                <th class="py-2 px-4">Actions</th>
            </tr>
        </thead>
        <tbody>
            <!-- Example Rows -->
            <tr class="border-t">
                <td class="py-2 px-4">1</td>
                <td class="py-2 px-4">Scooter X1</td>
                <td class="py-2 px-4">Scooter</td>
                <td class="py-2 px-4">AB12345</td>
                <td class="py-2 px-4 text-green-500">Available</td>
                <td class="py-2 px-4">
                    <button class="text-[#e75480] border border-[#e75480] rounded px-4 py-1 hover:bg-[#e75480] hover:text-white">Edit</button>
                    <button class="text-red-500 border border-red-500 rounded px-4 py-1 hover:bg-red-500 hover:text-white">Delete</button>
                </td>
            </tr>
            <tr class="border-t bg-gray-50">
                <td class="py-2 px-4">2</td>
                <td class="py-2 px-4">Bike Y2</td>
                <td class="py-2 px-4">Bike</td>
                <td class="py-2 px-4">CD67890</td>
                <td class="py-2 px-4 text-yellow-500">Unavailable</td>
                <td class="py-2 px-4">
                    <button class="text-[#e75480] border border-[#e75480] rounded px-4 py-1 hover:bg-[#e75480] hover:text-white">Edit</button>
                    <button class="text-red-500 border border-red-500 rounded px-4 py-1 hover:bg-red-500 hover:text-white">Delete</button>
                </td>
            </tr>
        </tbody>
    </table>
</div>
@endsection
