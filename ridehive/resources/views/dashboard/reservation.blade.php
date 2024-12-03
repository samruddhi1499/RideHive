@extends('dashboard.dashboard')

@section('dashboard-content')



<h2 class="text-2xl font-semibold text-center text-[#e75480] mb-6">Payment History</h2>

<div class="bg-white p-6 rounded-lg shadow">
    <!-- Payment Table -->
    <table class="w-full border-collapse">
        <thead class="bg-gray-100 text-left">
            <tr>
                <th class="py-2 px-4">Payment ID</th>
                <th class="py-2 px-4">Booking ID</th>
                <th class="py-2 px-4">Amount</th>
                <th class="py-2 px-4">Payment Method</th>
                <th class="py-2 px-4">Payment Date</th>
                <th class="py-2 px-4">Status</th>
            </tr>
        </thead>
        <tbody>
            @forelse($payments as $payment)
                <tr class="border-t">
                    <td class="py-2 px-4">#{{ $payment->payment_id }}</td>
                    <td class="py-2 px-4">#{{ $payment->booking_id }}</td>
                    <td class="py-2 px-4">${{ number_format($payment->amount, 2) }}</td>
                    <td class="py-2 px-4">{{ $payment->payment_method }}</td>
                    <td class="py-2 px-4">{{ $payment->payment_date->format('Y-m-d') }}</td>
                    <td class="py-2 px-4 {{ $payment->status === 'Successful' ? 'text-green-500' : 'text-yellow-500' }}">
                        {{ $payment->status}}
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="6" class="text-center py-4">No payment history found.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
