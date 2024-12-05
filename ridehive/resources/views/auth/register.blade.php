@extends('layouts.app')

@section('title', 'Register')

@section('content')
    <div class="mt-8 mb-14 max-w-md mx-auto bg-white p-6 rounded shadow-md">
        <h2 class="text-2xl text-[#e75480] text-center font-semibold mb-6">Register</h2>
        <form action="{{ route('register') }}" method="POST">
            @csrf
            <div class="mb-4">
                <label for="name" class="block mb-1 text-gray-600">Full Name</label>
                <input type="text" name="name" id="name" value="{{ old('name') }}" required 
                    class="w-full px-3 py-2 border rounded focus:ring @error('name') border-red-500 @enderror">
                @error('name')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>
            <div class="mb-4">
                <label for="email" class="block mb-1 text-gray-600">Email</label>
                <input type="email" name="email" id="email" value="{{ old('email') }}" required 
                    class="w-full px-3 py-2 border rounded focus:ring @error('email') border-red-500 @enderror">
                @error('email')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>
            <div class="mb-4">
                <label for="contact" class="block mb-1 text-gray-600">Contact Number</label>
                <input type="text" name="contact" id="contact" value="{{ old('contact') }}" 
                    class="w-full px-3 py-2 border rounded focus:ring @error('contact') border-red-500 @enderror">
                @error('contact')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>
            <div class="mb-4">
    <label for="role" class="block mb-1 text-gray-600">Register As</label>
    <select name="role" id="role" required class="w-full px-3 py-2 border rounded focus:ring">
        <option value="" disabled selected>Select Role</option>
        <option value="User">User</option>
        <option value="Vendor">Vendor</option>
    </select>
    @error('role')
        <span class="text-red-500 text-sm">{{ $message }}</span>
    @enderror
</div>

            <div class="mb-4">
                <label for="password" class="block mb-1 text-gray-600">Password</label>
                <input type="password" name="password" id="password" required 
                    class="w-full px-3 py-2 border rounded focus:ring @error('password') border-red-500 @enderror">
                @error('password')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>
            <div class="mb-4">
                <label for="password_confirmation" class="block mb-1 text-gray-600">Confirm Password</label>
                <input type="password" name="password_confirmation" id="password_confirmation" required 
                    class="w-full px-3 py-2 border rounded focus:ring">
            </div>
            <button type="submit" class="w-full mb-6 bg-[#e75480] text-white py-2 rounded hover:bg-gray-700">Register</button>
            <a href="{{ route('login') }}" class="ml-24 text-black hover:text-[#e75480]">Already a User...Login Now!!</a>
        </form>
    </div>
@endsection
