<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = require database_path('initial_data/categories.php');

        foreach ($categories as $key => $category) {
            \App\Models\Category::create([
                'name' => $key,
                'description' => $category,
            ]);
        }
    }
}
