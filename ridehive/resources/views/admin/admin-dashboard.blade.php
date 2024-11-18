@extends('layouts.app') <!-- Reusing the existing header and footer layout -->

@section('content')
<div class="flex bg-gray-100 min-h-screen">
    <!-- Sidebar -->
    <aside class="w-1/5 bg-[#e75480] text-white p-6">
        <h2 class="text-2xl font-bold mb-6">Admin Panel</h2>
        <nav class="space-y-4">
            <a href="{{ url('/admin/users') }}" class="block text-white hover:bg-white hover:text-[#e75480] p-2 rounded">View Users</a>
            <a href="{{ url('/admin/vendors') }}" class="block text-white hover:bg-white hover:text-[#e75480] p-2 rounded">Vendors</a>
            <a href="{{ url('/admin/vehicles') }}" class="block text-white hover:bg-white hover:text-[#e75480] p-2 rounded">Vehicles</a>
            <a href="{{ url('/admin/transactions') }}" class="block text-white hover:bg-white hover:text-[#e75480] p-2 rounded">Transaction History</a>
        </nav>
    </aside>

    <!-- Main Content Area -->
    <main class="flex-1 p-8">
        <!-- Admin Page Content -->
        <section>
            @yield('admin-content') <!-- This section will load dynamic content -->
        </section>
    </main>
</div>
@endsection
