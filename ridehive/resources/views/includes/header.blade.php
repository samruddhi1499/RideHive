<header class="bg-white shadow-lg drop-shadow-md">
    <div class="container mx-auto px-6 py-4 flex justify-between items-center">
        <h1 class="text-xl font-semibold">
            <a href="/" class=" text-[#e75480]">RideHive</a>
        </h1>
         <!-- Navigation -->
         <nav class="space-x-6 text-gray-600">
            @if(request()->is('dashboard*') || request()->is('admin*') || request()->is('vendor*')|| request()->is('user*'))
                <!-- Dashboard Header Icons -->
                <a href="{{ route('login') }}" class="text-gray-600 hover:text-[#e75480]">
                    <span >Logout</span>
                </a>
              
            @else
            <a href="/" class="hover:text-[#e75480]  hover:font-semibold hover:shadow-sm">Home</a>
            <a href="{{ route('login') }}" class="hover:text-[#e75480]  hover:font-semibold hover:shadow-sm">Login</a>
            <a href="{{ route('register') }}" class="hover:text-[#e75480]  hover:font-semibold hover:shadow-sm">Register</a>
        @endif
        </nav>
    </div>
</header>
