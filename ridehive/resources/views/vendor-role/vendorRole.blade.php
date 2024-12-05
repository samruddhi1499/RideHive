@extends('layouts.app') <!-- Reusing the existing header and footer layout -->

@section('content')
<div class="flex bg-gray-100 min-h-screen">
    <!-- Sidebar -->
    <aside class="w-1/5 bg-[#e75480] text-white p-6">
        <h2 class="text-2xl font-bold mb-6">Vendor Panel</h2>
        <nav class="space-y-4">

            <a href="{{ url('/vendor/vehicles') }}"
                class="block text-white hover:bg-white hover:text-[#e75480] p-2 rounded">Vehicles</a>
            <a href="{{ route('vendor-role.reservations', ['vendorId' => session('user_id')]) }}"
                class="block text-white hover:bg-white hover:text-[#e75480] p-2 rounded">
                Reservations
            </a>


            <a href="{{ route('vendor-role.bookingHistory', ['vendorId' => session('user_id')]) }}"
                class="block text-white hover:bg-white hover:text-[#e75480] p-2 rounded">Booking History</a>
        </nav>
    </aside>

    <!-- Main Content Area -->
    <main class="flex-1 p-8">
        <!-- Vendor Page Content -->
        <section>
            @yield('vendor-content') <!-- This section will load dynamic content -->
        </section>
    </main>
</div>
@endsection