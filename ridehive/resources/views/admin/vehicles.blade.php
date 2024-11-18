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
                <th class="py-2 px-4">Name</th>
                <th class="py-2 px-4">Type</th>
                <th class="py-2 px-4">Registration Number</th>
                <th class="py-2 px-4">Image</th>
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
                <td class="py-2 px-4">
                    <img src="/scooter2.jpg" alt="Scooter X1" class="w-20 h-20 object-cover rounded">
                </td>
                <td class="py-2 px-4">
                    <button class="text-[#e75480] border border-[#e75480] rounded px-4 py-1 hover:bg-[#e75480] hover:text-white">Approve</button>
                    <button class="text-red-500 border border-red-500 rounded px-4 py-1 hover:bg-red-500 hover:text-white">Decline</button>
                </td>
            </tr>
            <tr class="border-t bg-gray-50">
                <td class="py-2 px-4">2</td>
                <td class="py-2 px-4">Bike Y2</td>
                <td class="py-2 px-4">Bike</td>
                <td class="py-2 px-4">CD67890</td>
                <td class="py-2 px-4">
                    <img src="/white-cycle.jpg" alt="Bike Y2" class="w-20 h-20 object-cover rounded">
                </td>
                <td class="py-2 px-4">
                <button class="text-[#e75480] border border-[#e75480] rounded px-4 py-1 hover:bg-[#e75480] hover:text-white">Approve</button>
                <button class="text-red-500 border border-red-500 rounded px-4 py-1 hover:bg-red-500 hover:text-white">Decline</button>
                </td>
            </tr>
        </tbody>
    </table>
</div>

@endsection
