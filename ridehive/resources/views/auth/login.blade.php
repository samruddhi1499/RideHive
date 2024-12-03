@extends('layouts.app')

@section('title', 'Login')

@section('content')
    <div class="mt-8 mb-14 max-w-md mx-auto bg-white p-6 rounded shadow-md">
        <h2 class="text-2xl text-[#e75480] text-center font-semibold mb-6">Login</h2>
        <form action="{{ route('login') }}" method="POST">
            @csrf
            <div class="mb-4">
                <label for="email" class="block mb-1 text-gray-600">Email</label>
                <input type="email" name="email" id="email" required class="w-full px-3 py-2 border rounded focus:ring">
            </div>
            <div class="mb-4">
                <label for="password" class="block mb-1 text-gray-600">Password</label>
                <input type="password" name="password" id="password" required class="w-full px-3 py-2 border rounded focus:ring">
            </div>
            <button type="submit" class="w-full mb-6 bg-[#e75480] text-white py-2 rounded hover:bg-gray-700">Login</button>
            <a href="{{ route('register') }}" class="ml-24 text-black hover:text-[#e75480]">Don't have an account? Register Now!</a>
        </form>
    </div>
@endsection
