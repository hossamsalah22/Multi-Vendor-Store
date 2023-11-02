<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Store>
 */
class StoreFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            // name, description
            'name' => [
                'en' => fake()->company(1, true),
                'ar' => fake()->company(1, true),
            ],
            'description' => [
                'en' => fake()->paragraph(1),
                'ar' => fake()->paragraph(1),
            ],
        ];
    }
}
