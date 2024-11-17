@extends('dashboard.dashboard')

@section('dashboard-content')
<h2 class="text-2xl font-semibold text-center text-[#e75480] mb-6">My Reservations</h2>

<div class="bg-white p-6 rounded-lg shadow">
    <!-- Reservation Table -->
    <table class="w-full border-collapse">
        <thead class="bg-gray-100 text-left">
            <tr>
                <th class="py-2 px-4">Reservation ID</th>
                <th class="py-2 px-4">Vehicle</th>
                <th class="py-2 px-4">Pickup</th>
                <th class="py-2 px-4">Dropoff</th>
                <th class="py-2 px-4">Date</th>
                <th class="py-2 px-4">Status</th>
                <th class="py-2 px-4 text-center">Actions</th>
            </tr>
        </thead>
        <tbody>
            <!-- Example Reservation Row -->
            <tr class="border-t">
                <td class="py-2 px-4">#54321</td>
                <td class="py-2 px-4">Car Model A3</td>
                <td class="py-2 px-4">Central Park</td>
                <td class="py-2 px-4">Times Square</td>
                <td class="py-2 px-4">2024-12-01</td>
                <td class="py-2 px-4 text-blue-500">Upcoming</td>
                <td class="py-2 px-4 text-center">
                    <button class="text-[#e75480] hover:underline">Cancel</button>
                    <span class="mx-2">|</span>
                    <button class="text-[#e75480] hover:underline">View Details</button>
                </td>
            </tr>
            <tr class="border-t">
                <td class="py-2 px-4">#67891</td>
                <td class="py-2 px-4">Scooter Z4</td>
                <td class="py-2 px-4">Downtown</td>
                <td class="py-2 px-4">City Square</td>
                <td class="py-2 px-4">2024-12-02</td>
                <td class="py-2 px-4 text-blue-500">Upcoming</td>
                <td class="py-2 px-4 text-center">
                    <button class="text-[#e75480] hover:underline">Cancel</button>
                    <span class="mx-2">|</span>
                    <button class="text-[#e75480] hover:underline">View Details</button>
                </td>
            </tr>
        </tbody>
    </table>
</div>
@endsection
