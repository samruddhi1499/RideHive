<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PaymentsTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('payments')->insert([
            [
                'booking_id' => 1, // Assuming Booking ID
                'amount' => 79.95,
                'payment_date' => now(),
                'payment_method' => 'Credit Card',
                'status' => 'Successful',
                'created_at' => now(),
            ],
        ]);
    }
}
