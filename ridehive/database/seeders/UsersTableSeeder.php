<?php

namespace Database\Seeders;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('users')->insert([
            [
                'name' => 'John Doe',
                'email' => 'johndoe@example.com',
                'password' => Hash::make('password'),
                'role' => 'User',
                'status' => 'Active',
                'created_at' => now(),
            ],
            [
                'name' => 'Jane Vendor',
                'email' => 'janevendor@example.com',
                'password' => Hash::make('password'),
                'role' => 'Vendor',
                'status' => 'Active',
                'created_at' => now(),
            ],
            [
                'name' => 'Admin User',
                'email' => 'admin@example.com',
                'password' => Hash::make('password'),
                'role' => 'Admin',
                'status' => 'Active',
                'created_at' => now(),
            ],
        ]);
    }
}
