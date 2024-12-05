@extends('layouts.app')

@section('title', 'Booking Confirmation')

@section('content')
<div class="container mx-auto py-12">
    <div class="bg-white p-8 rounded-lg shadow-lg max-w-2xl mx-auto">
        <h1 class="text-3xl font-semibold text-[#e75480] mb-6 text-center">Booking Confirmation</h1>

        <div class="text-center">
            <p class="text-xl">Booking Error!</p>
            <p class="text-lg mt-4">Vehicle already booked. Please choose another vehicle.</p>

            <div class="mt-6">
                <a href="{{ route('dashboard.index') }}" class="px-8 w-2/5 py-3 bg-[#e75480] text-white font-semibold rounded hover:bg-gray-700 transition-colors">Back to Dashboard</a>
            </div>
        </div>
    </div>
</div>
@endsection
