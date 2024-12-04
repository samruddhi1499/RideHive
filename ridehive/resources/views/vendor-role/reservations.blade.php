@extends('vendor-role.vendorRole')

@section('vendor-content')
<h2 class="text-2xl font-semibold mb-6">Reservations</h2>

<!-- Bookings Table -->
<div class="bg-white p-6 rounded-lg shadow">
    <h3 class="text-lg font-semibold mb-4 text-[#e75480]">All Reservations</h3>

    <!-- Search Bar -->
    <div class="flex justify-end mb-4">
        <div class="relative w-1/3">
            <input 
                type="text" 
                id="searchInput" 
                placeholder="Search bookings..." 
                class="border rounded-full py-2 pl-12 pr-4 w-full focus:outline-none focus:ring-2 focus:ring-[#e75480]"
                onkeyup="filterTable()" 
            >
            <svg 
                class="absolute top-2 left-4 w-5 h-5 text-gray-400" 
                xmlns="http://www.w3.org/2000/svg" 
                fill="none" 
                viewBox="0 0 24 24" 
                stroke="currentColor"
            >
                <path 
                    stroke-linecap="round" 
                    stroke-linejoin="round" 
                    stroke-width="2" 
                    d="M10 20a8 8 0 100-16 8 8 0 000 16zm6-6l4 4"
                ></path>
            </svg>
        </div>
    </div>

    <table class="w-full border-collapse" id="reservationsTable">
        <thead class="bg-gray-100 text-left">
            <tr>
                <th class="py-2 px-4">Booking ID</th>
                <th class="py-2 px-4">User</th>
                <th class="py-2 px-4">Vehicle</th>
                <th class="py-2 px-4">Pickup Location</th>
                <th class="py-2 px-4">Dropoff Location</th>
                <th class="py-2 px-4">Start Date</th>
                <th class="py-2 px-4">End Date</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($reservations as $reservation)
                <tr class="border-t">
                    <td class="py-2 px-4">{{ $reservation->booking_id }}</td>
                    <td class="py-2 px-4">{{ $reservation->user->name }}</td>
                    <td class="py-2 px-4">{{ $reservation->vehicle->model }}</td>
                    <td class="py-2 px-4">{{ $reservation->pickup_location }}</td>
                    <td class="py-2 px-4">{{ $reservation->dropoff_location }}</td>
                    <td class="py-2 px-4">{{ $reservation->start_date }}</td>
                    <td class="py-2 px-4">{{ $reservation->end_date }}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="7" class="py-2 px-4 text-center">No reservations found.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>

<script>
    function filterTable() {
        // Get search input value
        const searchInput = document.getElementById('searchInput').value.toLowerCase();
        const table = document.getElementById('reservationsTable');
        const rows = table.getElementsByTagName('tr');

        // Loop through rows (skip the header row)
        for (let i = 1; i < rows.length; i++) {
            const cells = rows[i].getElementsByTagName('td');
            let rowMatches = false;

            // Check each cell in the row
            for (let j = 0; j < cells.length; j++) {
                const cellValue = cells[j].textContent || cells[j].innerText;
                if (cellValue.toLowerCase().includes(searchInput)) {
                    rowMatches = true;
                    break;
                }
            }

            // Show or hide the row based on the match
            rows[i].style.display = rowMatches ? '' : 'none';
        }
    }
</script>
@endsection
