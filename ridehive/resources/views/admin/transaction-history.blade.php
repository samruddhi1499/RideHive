@extends('admin.admin-dashboard')

@section('admin-content')
<h2 class="text-2xl font-semibold mb-6">Transaction History</h2>

<div class="bg-white p-6 rounded-lg shadow">
    <h3 class="text-lg font-semibold mb-4 text-[#e75480]">All Payments</h3>
    <table class="w-full border-collapse">
        <thead class="bg-gray-100 text-left">
            <tr>
                <th class="py-2 px-4">Payment ID</th>
                <th class="py-2 px-4">User</th>
                <th class="py-2 px-4">Amount</th>
                <th class="py-2 px-4">Payment Method</th>
                <th class="py-2 px-4">Payment Date</th>
                <th class="py-2 px-4">Status</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($payments as $payment)
                <tr class="border-t {{ $loop->odd ? 'bg-gray-50' : '' }}">
                    <td class="py-2 px-4">{{ $payment->payment_id }}</td>
                    <td class="py-2 px-4">
                        {{ $payment->user ? $payment->user->name : 'N/A' }}
                    </td>
                    <td class="py-2 px-4">${{ number_format($payment->amount, 2) }}</td>
                    <td class="py-2 px-4">{{ $payment->payment_method }}</td>
                    <td class="py-2 px-4">{{ $payment->payment_date }}</td>
                    <td class="py-2 px-4 text-green-500">{{ $payment->status }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection