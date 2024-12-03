@extends('admin.admin-dashboard')

@section('admin-content')
<h2 class="text-2xl font-semibold mb-6">View Users</h2>

<div class="bg-white p-6 rounded-lg shadow">
    <!-- User Table -->
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
            @forelse($users as $user)
                <tr class="border-t {{ $loop->odd ? 'bg-gray-50' : '' }}">
                    <td class="py-2 px-4">{{ $user->user_id }}</td>
                    <td class="py-2 px-4">{{ $user->name }}</td>
                    <td class="py-2 px-4">{{ $user->email }}</td>
                    <td class="py-2 px-4">{{ $user->role }}</td>
                    <td class="py-2 px-4">
                        <!-- Delete Form -->
                        <form action="{{ route('admin.users.delete', $user->user_id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this user?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-red-500 border border-red-500 rounded px-4 py-1 hover:bg-red-500 hover:text-white">
                                Delete
                            </button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="5" class="py-4 text-center text-gray-500">No users found.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
