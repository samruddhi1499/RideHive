<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AvailabilityTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('availability')->insert([
            [
                'vehicle_id' => 1, // Assuming Bike ID
                'start_date' => '2024-11-06',
                'end_date' => '2024-11-10',
                'status' => 'Available',
                'booking_id' => null,
                'created_at' => now(),
            ],
            [
                'vehicle_id' => 2, // Assuming Scooter ID
                'start_date' => '2024-11-06',
                'end_date' => '2024-11-10',
                'status' => 'Unavailable',
                'booking_id' => null,
                'created_at' => now(),
            ],
        ]);
    }
}

