@extends('layouts.app')

@section('title', 'Register')

@section('content')
    <div class=" mt-8 max-w-md mx-auto bg-white p-6 rounded shadow-md">
        <h2 class="text-2xl text-[#e75480] text-center font-semibold mb-6">Register</h2>
        <form action="{{ route('register') }}" method="POST">
            @csrf
            <div class="mb-4">
                <label for="name" class="block mb-1 text-gray-600">Full Name</label>
                <input type="text" name="name" id="name" required class="w-full px-3 py-2 border rounded focus:ring">
            </div>
            <div class="mb-4">
                <label for="email" class="block mb-1 text-gray-600">Email</label>
                <input type="email" name="email" id="email" required class="w-full px-3 py-2 border rounded focus:ring">
            </div>
            <div class="mb-4">
                <label for="password" class="block mb-1 text-gray-600">Password</label>
                <input type="password" name="password" id="password" required class="w-full px-3 py-2 border rounded focus:ring">
            </div>
            <button type="submit" class="w-full bg-[#e75480] text-white py-2 rounded hover:bg-gray-700">Register</button>
        </form>
    </div>
@endsection
