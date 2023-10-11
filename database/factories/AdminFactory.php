<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Admin>
 */
class AdminFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [

            'name' => 'Super Admin',
            'email' => 'admin@hossam.com',
            'username' => 'hossamsalah22',
            'password' => Hash::make('12345678'),
            'phone_number' => '01012512599',
            'is_super_admin' => true,
            'store_id' => 1,

        ];
    }
}
