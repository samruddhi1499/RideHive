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
            <p class="text-2xl font-bold text-[#e75480]">24</p>
        </div>
        <div class="bg-white border-l-4 border-green-500 p-4 rounded shadow">
            <h3 class="text-gray-600 text-sm">Completed</h3>
            <p class="text-2xl font-bold text-green-500">18</p>
        </div>
        <div class="bg-white border-l-4 border-yellow-500 p-4 rounded shadow">
            <h3 class="text-gray-600 text-sm">Pending</h3>
            <p class="text-2xl font-bold text-yellow-500">6</p>
        </div>
    </div>

    <!-- Controls -->
    <div class="flex justify-between items-center mt-4 mb-2">
        <!-- Show Entries -->
        <div>
            <label for="entries" class="text-gray-600">Show</label>
            <select id="entries" class="border rounded px-2 py-1 text-gray-600 focus:ring-[#e75480] focus:border-[#e75480]">
                <option value="10">10</option>
                <option value="25">25</option>
                <option value="50">50</option>
                <option value="100">100</option>
            </select>
            <span class="text-gray-600">entries</span>
        </div>

        <!-- Search -->
        <div class="relative w-64">
            <input 
                type="text" 
                placeholder="Search..." 
                class="border rounded-full py-2 pl-12 pr-4 w-full focus:outline-none focus:ring-2 focus:ring-[#e75480]"
                style="margin-left: 23px;" 
            >
            <svg 
                class="absolute top-2 left-4 w-5 h-5 text-gray-400" 
                xmlns="http://www.w3.org/2000/svg" 
                style="bottom: 10px;" 
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

    <!-- Booking Table -->
    <table class="w-full border-collapse mt-4">
        <thead class="bg-gray-100 text-left">
            <tr>
                <th class="py-2 px-4">S. No</th>
                <th class="py-2 px-4">User</th>
                <th class="py-2 px-4">Provider</th>
                <th class="py-2 px-4">Pickup Location</th>
                <th class="py-2 px-4">Dropoff Location</th>
                <th class="py-2 px-4">Check-In</th>
                <th class="py-2 px-4">Check-Out</th>
                <th class="py-2 px-4">Status</th>
                <th class="py-2 px-4">Action</th>
            </tr>
        </thead>
        <tbody>
            <!-- Example Rows -->
            <tr class="border-t">
                <td class="py-2 px-4">1</td>
                <td class="py-2 px-4">Developer S</td>
                <td class="py-2 px-4">Charles</td>
                <td class="py-2 px-4">Parking Lot</td>
                <td class="py-2 px-4">City Square</td>
                <td class="py-2 px-4">10 Jul 2024, 11:27 AM</td>
                <td class="py-2 px-4">12 Jul 2024, 12:00 PM</td>
                <td class="py-2 px-4 text-green-500">Checked-Out</td>
                <td class="py-2 px-4 text-center">
                    <button class="text-[#e75480] border border-[#e75480] rounded px-4 py-1 hover:bg-[#e75480] hover:text-white">Action</button>
                </td>
            </tr>
            <tr class="border-t bg-gray-50">
                <td class="py-2 px-4">2</td>
                <td class="py-2 px-4">User</td>
                <td class="py-2 px-4">Nazomy</td>
                <td class="py-2 px-4">Parking for Cars</td>
                <td class="py-2 px-4">Downtown</td>
                <td class="py-2 px-4">11 Jul 2024, 9:00 AM</td>
                <td class="py-2 px-4">13 Jul 2024, 5:00 PM</td>
                <td class="py-2 px-4 text-yellow-500">Booked</td>
                <td class="py-2 px-4 text-center">
                    <button class="text-[#e75480] border border-[#e75480] rounded px-4 py-1 hover:bg-[#e75480] hover:text-white">Action</button>
                </td>
            </tr>
            <tr class="border-t">
        <td class="py-2 px-4">3</td>
        <td class="py-2 px-4">Jane Doe</td>
        <td class="py-2 px-4">John's Rentals</td>
        <td class="py-2 px-4">Central Mall</td>
        <td class="py-2 px-4">High Street</td>
        <td class="py-2 px-4">15 Jul 2024, 3:00 PM</td>
        <td class="py-2 px-4">16 Jul 2024, 10:00 AM</td>
        <td class="py-2 px-4 text-green-500">Checked-Out</td>
        <td class="py-2 px-4 text-center">
            <button class="text-[#e75480] border border-[#e75480] rounded px-4 py-1 hover:bg-[#e75480] hover:text-white">Action</button>
        </td>
    </tr>
    <tr class="border-t bg-gray-50">
        <td class="py-2 px-4">4</td>
        <td class="py-2 px-4">Michael B.</td>
        <td class="py-2 px-4">Rental Co</td>
        <td class="py-2 px-4">Airport Parking</td>
        <td class="py-2 px-4">Downtown Plaza</td>
        <td class="py-2 px-4">17 Jul 2024, 7:00 AM</td>
        <td class="py-2 px-4">18 Jul 2024, 12:00 PM</td>
        <td class="py-2 px-4 text-yellow-500">Pending</td>
        <td class="py-2 px-4 text-center">
            <button class="text-[#e75480] border border-[#e75480] rounded px-4 py-1 hover:bg-[#e75480] hover:text-white">Action</button>
        </td>
    </tr>
    <tr class="border-t">
        <td class="py-2 px-4">5</td>
        <td class="py-2 px-4">Anna K.</td>
        <td class="py-2 px-4">Fast Wheels</td>
        <td class="py-2 px-4">Old Town</td>
        <td class="py-2 px-4">New Park</td>
        <td class="py-2 px-4">19 Jul 2024, 8:00 AM</td>
        <td class="py-2 px-4">20 Jul 2024, 5:00 PM</td>
        <td class="py-2 px-4 text-green-500">Completed</td>
        <td class="py-2 px-4 text-center">
            <button class="text-[#e75480] border border-[#e75480] rounded px-4 py-1 hover:bg-[#e75480] hover:text-white">Action</button>
        </td>
    </tr>
    <tr class="border-t bg-gray-50">
        <td class="py-2 px-4">6</td>
        <td class="py-2 px-4">Chris L.</td>
        <td class="py-2 px-4">Budget Rentals</td>
        <td class="py-2 px-4">City Square</td>
        <td class="py-2 px-4">Suburb Mall</td>
        <td class="py-2 px-4">20 Jul 2024, 6:00 PM</td>
        <td class="py-2 px-4">22 Jul 2024, 9:00 AM</td>
        <td class="py-2 px-4 text-yellow-500">Pending</td>
        <td class="py-2 px-4 text-center">
            <button class="text-[#e75480] border border-[#e75480] rounded px-4 py-1 hover:bg-[#e75480] hover:text-white">Action</button>
        </td>
    </tr>
    <tr class="border-t">
        <td class="py-2 px-4">7</td>
        <td class="py-2 px-4">Ella R.</td>
        <td class="py-2 px-4">Quick Rentals</td>
        <td class="py-2 px-4">Harbor Station</td>
        <td class="py-2 px-4">Beach Avenue</td>
        <td class="py-2 px-4">23 Jul 2024, 2:00 PM</td>
        <td class="py-2 px-4">24 Jul 2024, 6:00 PM</td>
        <td class="py-2 px-4 text-green-500">Completed</td>
        <td class="py-2 px-4 text-center">
            <button class="text-[#e75480] border border-[#e75480] rounded px-4 py-1 hover:bg-[#e75480] hover:text-white">Action</button>
        </td>
    </tr>
        </tbody>
    </table>

    <!-- Pagination -->
    <div class="flex justify-between items-center mt-4">
        <span class="text-gray-600">Showing 1 to 10 of 24 entries</span>
        <div class="flex space-x-1">
            <button class="px-3 py-1 bg-gray-200 rounded hover:bg-[#e75480] hover:text-white">Previous</button>
            <button class="px-3 py-1 bg-[#e75480] text-white rounded">1</button>
            <button class="px-3 py-1 bg-gray-200 rounded hover:bg-[#e75480] hover:text-white">2</button>
            <button class="px-3 py-1 bg-gray-200 rounded hover:bg-[#e75480] hover:text-white">Next</button>
        </div>
    </div>
</div>
@endsection
