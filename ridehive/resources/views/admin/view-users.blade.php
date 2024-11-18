@extends('admin.admin-dashboard')

@section('admin-content')
<h2 class="text-2xl font-semibold mb-6">View Users</h2>

<div class="bg-white p-6 rounded-lg shadow">
    <!-- Example User Table -->
    <table class="w-full border-collapse">
        <thead class="bg-gray-100 text-left">
            <tr>
                <th class="py-2 px-4">ID</th>
                <th class="py-2 px-4">Name</th>
                <th class="py-2 px-4">Email</th>
                <th class="py-2 px-4">Role</th>
                <th class="py-2 px-4">Actions</th>
            </tr>
        </thead>
        <tbody>
            <!-- Example Rows -->
            <tr class="border-t">
                <td class="py-2 px-4">1</td>
                <td class="py-2 px-4">John Doe</td>
                <td class="py-2 px-4">john.doe@example.com</td>
                <td class="py-2 px-4">User</td>
                <td class="py-2 px-4">
                    <button class="text-[#e75480] border border-[#e75480] rounded px-4 py-1 hover:bg-[#e75480] hover:text-white">Edit</button>
                </td>
            </tr>
        </tbody>
    </table>
</div>
@endsection
