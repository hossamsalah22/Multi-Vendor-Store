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

        foreach ($categories as $category) {
            \App\Models\Category::create([
                'name' => [
                    'en' => $category['name']['en'],
                    'ar' => $category['name']['ar'],
                ],
                'description' => [
                    'en' => $category['description']['en'],
                    'ar' => $category['description']['ar'],
                ],
            ]);
        }
    }
}
