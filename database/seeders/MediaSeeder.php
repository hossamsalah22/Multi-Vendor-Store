<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Product;
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
        $products = Product::all();
        $user->addMediaFromUrl(asset("dist/img/user2-160x160.jpg"))
            ->toMediaCollection('users');
        foreach ($categories as $category) {
            $random = rand(2, 5);
            $category->addMediaFromUrl(asset("dist/img/avatar{$random}.png"))
                ->toMediaCollection('categories');
        }
        foreach ($stores as $store) {
            $random = rand(1, 4);
            $store->addMediaFromUrl(asset("dist/img/photo{$random}.jpg"))
                ->toMediaCollection('stores');
        }
        foreach ($products as $product) {
            $random = rand(1, 8);
            $product->addMediaFromUrl(asset("assets/images/products/product-{$random}.jpg"))
                ->toMediaCollection('products');
        }
    }
}
