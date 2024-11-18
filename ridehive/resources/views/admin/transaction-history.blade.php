@extends('admin.admin-dashboard')

@section('admin-content')
<h2 class="text-2xl font-semibold mb-6">Transaction History</h2>

<!-- Transaction Table -->
<div class="bg-white p-6 rounded-lg shadow">
    <h3 class="text-lg font-semibold mb-4 text-[#e75480]">All Transactions</h3>

    <!-- Search Bar -->
    <div class="flex justify-end mb-4">
        <div class="relative w-1/3">
            <input 
                type="text" 
                placeholder="Search transactions..." 
                class="border rounded-full py-2 pl-12 pr-4 w-full focus:outline-none focus:ring-2 focus:ring-[#e75480]"
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

    <table class="w-full border-collapse">
        <thead class="bg-gray-100 text-left">
            <tr>
                <th class="py-2 px-4">Transaction ID</th>
                <th class="py-2 px-4">User</th>
                <th class="py-2 px-4">Amount</th>
                <th class="py-2 px-4">Payment Method</th>
                <th class="py-2 px-4">Date</th>
                <th class="py-2 px-4">Status</th>
                <th class="py-2 px-4">Actions</th>
            </tr>
        </thead>
        <tbody>
            <!-- Example Rows -->
            <tr class="border-t">
                <td class="py-2 px-4">TX101</td>
                <td class="py-2 px-4">John Doe</td>
                <td class="py-2 px-4">$50.00</td>
                <td class="py-2 px-4">Credit Card</td>
                <td class="py-2 px-4">2024-11-20</td>
                <td class="py-2 px-4 text-green-500">Completed</td>
                <td class="py-2 px-4">
                    <button class="text-[#e75480] border border-[#e75480] rounded px-4 py-1 hover:bg-[#e75480] hover:text-white">View</button>
                    <button class="text-red-500 border border-red-500 rounded px-4 py-1 hover:bg-red-500 hover:text-white">Delete</button>
                </td>
            </tr>
            <tr class="border-t bg-gray-50">
                <td class="py-2 px-4">TX102</td>
                <td class="py-2 px-4">Jane Smith</td>
                <td class="py-2 px-4">$100.00</td>
                <td class="py-2 px-4">PayPal</td>
                <td class="py-2 px-4">2024-11-21</td>
                <td class="py-2 px-4 text-yellow-500">Pending</td>
                <td class="py-2 px-4">
                    <button class="text-[#e75480] border border-[#e75480] rounded px-4 py-1 hover:bg-[#e75480] hover:text-white">View</button>
                    <button class="text-red-500 border border-red-500 rounded px-4 py-1 hover:bg-red-500 hover:text-white">Delete</button>
                </td>
            </tr>
            <tr class="border-t">
                <td class="py-2 px-4">TX103</td>
                <td class="py-2 px-4">Chris Johnson</td>
                <td class="py-2 px-4">$75.00</td>
                <td class="py-2 px-4">Bank Transfer</td>
                <td class="py-2 px-4">2024-11-22</td>
                <td class="py-2 px-4 text-red-500">Failed</td>
                <td class="py-2 px-4">
                    <button class="text-[#e75480] border border-[#e75480] rounded px-4 py-1 hover:bg-[#e75480] hover:text-white">View</button>
                    <button class="text-red-500 border border-red-500 rounded px-4 py-1 hover:bg-red-500 hover:text-white">Delete</button>
                </td>
            </tr>
        </tbody>
    </table>
</div>
@endsection
