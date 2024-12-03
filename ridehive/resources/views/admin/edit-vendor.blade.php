@extends('admin.admin-dashboard')

@section('admin-content')
<h2 class="text-2xl font-semibold mb-6">Edit Vendor</h2>

<div class="bg-white p-6 rounded-lg shadow">
    <form action="{{ route('admin.vendors.update', $user->user_id) }}" method="POST" class="space-y-6">
        @csrf
        @method('PUT')
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div>
                <label for="vendor_name" class="block text-gray-600 mb-2">Vendor Name</label>
                <input type="text" id="vendor_name" name="vendor_name" value="{{ $user->name }}" class="border rounded w-full py-2 px-4 focus:ring-[#e75480]" required>
            </div>
            <div>
                <label for="vendor_email" class="block text-gray-600 mb-2">Vendor Email</label>
                <input type="email" id="vendor_email" name="vendor_email" value="{{ $user->email }}" class="border rounded w-full py-2 px-4 focus:ring-[#e75480]" required>
            </div>
        </div>
        <div class="mt-4">
            <label for="vendor_contact" class="block text-gray-600 mb-2">Contact Number</label>
            <input type="text" id="vendor_contact" name="vendor_contact" value="{{ $user->contact }}" class="border rounded w-full py-2 px-4 focus:ring-[#e75480]" required>
        </div>
        <button type="submit" class="bg-[#e75480] text-white px-6 py-2 rounded hover:bg-gray-700 mt-4">Update Vendor</button>
    </form>
</div>
@endsection
