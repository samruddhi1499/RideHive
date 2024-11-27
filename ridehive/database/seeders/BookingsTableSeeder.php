<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BookingsTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('bookings')->insert([
            [
                'user_id' => 1, // Assuming John Doe's ID
                'vehicle_id' => 1, // Assuming Bike ID
                'start_date' => '2024-11-01',
                'end_date' => '2024-11-05',
                'pickup_location' => 'Downtown',
                'dropoff_location' => 'Uptown',
                'total_cost' => 79.95,
                'payment_status' => 'Paid',
                'created_at' => now(),
            ],
        ]);
    }
}
