<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Create 1 user as admin
        User::create([
            'name' => 'Admin',
            'email' => 'admin@hossam.com',
            'phone_number' => '01000000000',
            'password' => Hash::make('12345678'),
            'email_verified_at' => now(),
            'type' => 'super-admin'
        ]);

    }
}
