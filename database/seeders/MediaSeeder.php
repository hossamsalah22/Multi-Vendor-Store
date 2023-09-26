<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Store;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MediaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = User::first();
        $categories = Category::all();
        $stores = Store::all();
        $user->addMediaFromUrl(asset("dist/img/user2-160x160.jpg"))
            ->toMediaCollection('users');
        foreach ($categories as $category) {
            $category->addMediaFromUrl(asset("dist/img/photo1.png"))
                ->toMediaCollection('categories');
        }
        foreach ($stores as $store) {
            $store->addMediaFromUrl(asset("dist/img/prod-3.jpg"))
                ->toMediaCollection('stores');
        }
    }
}
