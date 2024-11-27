<?php

namespace Database\Seeders;


use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class VehiclesTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('vehicles')->insert([
            [
                'vendor_id' => 2, // Assuming Jane Vendor's ID
                'type' => 'Bike',
                'model' => 'Mountain X100',
                'price_per_day' => 15.99,
                'status' => 'Available',
                'created_at' => now(),
            ],
            [
                'vendor_id' => 2, // Assuming Jane Vendor's ID
                'type' => 'Scooter',
                'model' => 'Vespa LX',
                'price_per_day' => 10.50,
                'status' => 'Unavailable',
                'created_at' => now(),
            ],
        ]);
    }
}
