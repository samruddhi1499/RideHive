@extends('admin.admin-dashboard')

@section('admin-content')
<h2 class="text-2xl font-semibold mb-6">Manage Vendors</h2>

<!-- Add Vendor Form -->
<div class="bg-white p-6 rounded-lg shadow mb-8">
    <h3 class="text-lg font-semibold mb-4 text-[#e75480]">Add New Vendor</h3>
    <form action="#" method="POST" class="space-y-4">
        @csrf
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div>
                <label for="vendor_name" class="block text-gray-600">Vendor Name</label>
                <input type="text" id="vendor_name" name="vendor_name" class="border rounded w-full py-2 px-4 focus:ring-[#e75480]" placeholder="Enter vendor name" required>
            </div>
            <div>
                <label for="vendor_email" class="block text-gray-600">Vendor Email</label>
                <input type="email" id="vendor_email" name="vendor_email" class="border rounded w-full py-2 px-4 focus:ring-[#e75480]" placeholder="Enter vendor email" required>
            </div>
        </div>
        <div>
            <label for="vendor_contact" class="block text-gray-600">Contact Number</label>
            <input type="text" id="vendor_contact" name="vendor_contact" class="border rounded w-full py-2 px-4 focus:ring-[#e75480]" placeholder="Enter contact number" required>
        </div>
        <button type="submit" class="bg-[#e75480] text-white px-6 py-2 rounded hover:bg-gray-700">Add Vendor</button>
    </form>
</div>

<!-- Vendors Table -->
<div class="bg-white p-6 rounded-lg shadow">
    <h3 class="text-lg font-semibold mb-4 text-[#e75480]">Vendors List</h3>
    <table class="w-full border-collapse">
        <thead class="bg-gray-100 text-left">
            <tr>
                <th class="py-2 px-4">ID</th>
                <th class="py-2 px-4">Name</th>
                <th class="py-2 px-4">Email</th>
                <th class="py-2 px-4">Contact</th>
                <th class="py-2 px-4">Actions</th>
            </tr>
        </thead>
        <tbody>
            <!-- Example Rows -->
            <tr class="border-t">
                <td class="py-2 px-4">1</td>
                <td class="py-2 px-4">Vendor A</td>
                <td class="py-2 px-4">vendor.a@example.com</td>
                <td class="py-2 px-4">123-456-7890</td>
                <td class="py-2 px-4">
                    <button class="text-[#e75480] border border-[#e75480] rounded px-4 py-1 hover:bg-[#e75480] hover:text-white">Edit</button>
                    <button class="text-red-500 border border-red-500 rounded px-4 py-1 hover:bg-red-500 hover:text-white">Delete</button>
                </td>
            </tr>
            <tr class="border-t bg-gray-50">
                <td class="py-2 px-4">2</td>
                <td class="py-2 px-4">Vendor B</td>
                <td class="py-2 px-4">vendor.b@example.com</td>
                <td class="py-2 px-4">987-654-3210</td>
                <td class="py-2 px-4">
                    <button class="text-[#e75480] border border-[#e75480] rounded px-4 py-1 hover:bg-[#e75480] hover:text-white">Edit</button>
                    <button class="text-red-500 border border-red-500 rounded px-4 py-1 hover:bg-red-500 hover:text-white">Delete</button>
                </td>
            </tr>
        </tbody>
    </table>
</div>
@endsection
