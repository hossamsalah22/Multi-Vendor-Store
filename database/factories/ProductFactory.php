<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => [
                'en' => $this->faker->productName,
                'ar' => $this->faker->productName,
            ],
            'description' => [
                'en' => $this->faker->paragraph,
                'ar' => $this->faker->paragraph,
            ],
            'price' => fake()->randomFloat(2, 1, 1000),
            'quantity' => fake()->numberBetween(1, 150000),
            'category_id' => fake()->numberBetween(1, 6),
            'store_id' => fake()->numberBetween(1, 20),
        ];
    }
}
