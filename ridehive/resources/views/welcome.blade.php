@extends('layouts.app')

@section('title', 'Welcome')

@section('content')
<!-- Hero Section -->
<div class="mt-10 mb-6 text-center flex flex-col lg:flex-row items-center justify-between space-y-8 lg:space-y-0">
    <!-- Content Section -->
    <div class=" ml-16 flex-1 text-center lg:text-left">
        <h1 class="text-4xl text-[#e75480] mb-4">Welcome to RideHive</h1>
        <p class="text-gray-800 mb-6">Bike Ride made simple, secure, and sustainable.</p>
        
        <!-- Button Container -->
        <div class="space-x-4">
            <a href="{{ route('login') }}" class="px-6 py-3 border bg-white text-black rounded hover:bg-gray-100">Login</a>
            <a href="{{ route('register') }}" class="px-6 py-3 bg-[#e75480] text-white rounded hover:bg-gray-800">Register</a>
        </div>
    </div>

    <!-- Image Section -->
    <div class="flex-1">
        <img src="{{ asset('bg.jpg') }}" alt="Carpooling" class="w-full h-auto">

    </div>
</div>


    <!-- Features Section -->
    <section id="features" class=" m-11 mt-32 py-14  ">
        <div class="container mx-auto text-center ">
            <h2 class="text-3xl font-semibold text-[#333] mb-12">Our Features</h2>
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-12">
                <div class="bg-white p-6 rounded-lg shadow-lg hover:shadow-xl transition-shadow ease-in-out duration-300">
                    <img src="{{ asset('rent.jpg') }}" alt="Easy Carpooling" class="w-full h-64 rounded-t-lg">
                    <h3 class="text-xl font-semibold mt-4 text-[#e75480]">Easy Rental</h3>
                    <p class="mt-2 text-gray-600">Rent a bike or scooter effortlessly.</p>
                </div>
                <div class="bg-white p-6 rounded-lg shadow-lg hover:shadow-xl transition-shadow ease-in-out duration-300">
                    <img src="savemoney.jpg" alt="Save Money" class="w-full h-64 rounded-t-lg">
                    <h3 class="text-xl font-semibold mt-4 text-[#e75480]">Save Money</h3>
                    <p class="mt-2 text-gray-600">Reduce your transportation costs.</p>
                </div>
                <div class="bg-white p-6 rounded-lg shadow-lg hover:shadow-xl transition-shadow ease-in-out duration-300">
                    <img src="eco.jpg" alt="Eco-Friendly" class="w-full h-64 rounded-t-lg">
                    <h3 class="text-xl font-semibold mt-4 text-[#e75480]">Eco-Friendly</h3>
                    <p class="mt-2 text-gray-600">Help reduce your carbon footprint by riding bikes.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Testimonials Section -->
    <section id="testimonials" class=" bg-gray-100">
        <div class="container py-20 m-10 mx-auto text-center">
            <h2 class="text-3xl font-semibold text-[#e75480] mb-12">What Our Users Say</h2>
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-12">
                <div class="bg-white p-6 rounded-lg shadow-lg hover:shadow-xl transition-shadow ease-in-out duration-300">
                    <img src="{{ asset('person1.jpg') }}" alt="User 1" class="w-20 h-20 rounded-full mx-auto mb-4">
                    <p class="text-gray-600 mb-4">"RideHive made my daily commute so much easier! It's quick, affordable, and eco-friendly."</p>
                    <h3 class="text-lg font-semibold text-[#e75480]">Jhon J.</h3>
                    <p class="text-sm text-gray-500">User for 3+ years</p>
                </div>
                <div class="bg-white p-6 rounded-lg shadow-lg hover:shadow-xl transition-shadow ease-in-out duration-300">
                    <img src="{{ asset('person2.jpg') }}" alt="User 2" class="w-20 h-20 rounded-full mx-auto mb-4">
                    <p class="text-gray-600 mb-4">"I love that I can find rental bikes nearby. It's both cost-effective and convenient!"</p>
                    <h3 class="text-lg font-semibold text-[#e75480]">Sarah D.</h3>
                    <p class="text-sm text-gray-500">User for 1+ year</p>
                </div>
                <div class="bg-white p-6 rounded-lg shadow-lg hover:shadow-xl transition-shadow ease-in-out duration-300">
                    <img src="{{ asset('person3.jpg') }}" alt="User 3" class="w-20 h-20 rounded-full mx-auto mb-4">
                    <p class="text-gray-600 mb-4">"Being part of RideHive has helped me reduce my travel expenses while helping the environment!"</p>
                    <h3 class="text-lg font-semibold text-[#e75480]">Emily W.</h3>
                    <p class="text-sm text-gray-500">New User</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Call to Action Section -->
    <section class="bg-[#e75480] text-white py-20">
        <div class="container mx-auto text-center">
            <h2 class="text-3xl font-semibold mb-6">Join the RideHive Community</h2>
            <p class="text-xl mb-6">Start renting today and experience the benefits of convenience and cost savings.</p>
            <a href="#signup" class="bg-white text-[#e75480] px-8 py-3 rounded-full text-lg hover:bg-[#f1f1f1] transition-colors ease-in-out duration-300">Sign Up Now</a>
        </div>
    </section>
@endsection
