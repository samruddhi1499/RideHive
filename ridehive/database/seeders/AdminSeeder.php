<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class AdminSeeder extends Seeder
{
    public function run()
    {
        User::create([
            'name' => 'Admin',
            'email' => 'admin@gmail.com',
            'contact' => '4375439806',
            'password' => Hash::make('password123'),
            'role' => 'Admin',
            'status' => 'Active',
        ]);
    }
}
