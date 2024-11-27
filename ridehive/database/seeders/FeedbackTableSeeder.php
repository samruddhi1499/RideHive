<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FeedbackTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('feedback')->insert([
            [
                'booking_id' => 1, // Assuming Booking ID
                'user_id' => 1, // Assuming John Doe's ID
                'rating' => 5,
                'comment' => 'Great experience! The bike was in excellent condition.',
                'created_at' => now(),
            ],
        ]);
    }
}
