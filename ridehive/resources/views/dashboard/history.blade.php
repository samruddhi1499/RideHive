@extends('dashboard.dashboard')

@section('dashboard-content')
<div class="bg-white p-6 rounded-lg shadow">
    <!-- Header Bar -->
    <div class="bg-[#e75480] text-white text-lg font-semibold p-4 rounded-t-lg">
        HISTORY
    </div>

    <!-- Summary Section -->
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 my-6">
        <div class="bg-white border-l-4 border-[#e75480] p-4 rounded shadow">
            <h3 class="text-gray-600 text-sm">Total Bookings</h3>
            <p class="text-2xl font-bold text-[#e75480]">{{ $total }}</p>
        </div>
        <div class="bg-white border-l-4 border-green-500 p-4 rounded shadow">
            <h3 class="text-gray-600 text-sm">Completed</h3>
            <p class="text-2xl font-bold text-green-500">{{ $completed }}</p>
        </div>
        <div class="bg-white border-l-4 border-yellow-500 p-4 rounded shadow">
            <h3 class="text-gray-600 text-sm">Pending</h3>
            <p class="text-2xl font-bold text-yellow-500">{{ $pending }}</p>
        </div>
    </div>

    <!-- Booking Table -->
    <table class="w-full border-collapse mt-4">
        <thead class="bg-gray-100 text-left">
            <tr>
                <th class="py-2 px-4">S. No</th>
                <th class="py-2 px-4">User</th>
                <th class="py-2 px-4">Vehicle</th>
                <th class="py-2 px-4">Pickup Location</th>
                <th class="py-2 px-4">Dropoff Location</th>
                <th class="py-2 px-4">Check-In</th>
                <th class="py-2 px-4">Check-Out</th>
                <th class="py-2 px-4">Status</th>
            </tr>
        </thead>
        <tbody>
            @forelse($bookings as $key => $booking)
                <tr class="{{ $key % 2 === 0 ? 'bg-gray-50' : '' }} border-t">
                    <td class="py-2 px-4">{{ $key + 1 }}</td>
                    <td class="py-2 px-4">{{ $booking->user->name ?? 'N/A' }}</td>
                    <td class="py-2 px-4">{{ $booking->vehicle->model ?? 'N/A' }}</td>
                    <td class="py-2 px-4">{{ $booking->pickup_location }}</td>
                    <td class="py-2 px-4">{{ $booking->dropoff_location }}</td>
                    <td class="py-2 px-4">{{ $booking->start_date->format('d M Y, h:i A') }}</td>
                    <td class="py-2 px-4">{{ $booking->end_date->format('d M Y, h:i A') }}</td>
                    <td class="py-2 px-4 {{ $booking->payment_status === 'Paid' ? 'text-green-500' : 'text-yellow-500' }}">
                        {{ $booking->payment_status }}
                    </td>
             
                </tr>
            @empty
                <tr>
                    <td colspan="9" class="py-4 text-center text-gray-500">No bookings found.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
