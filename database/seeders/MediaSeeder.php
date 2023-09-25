<?php

namespace Database\Seeders;

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
        $model = User::first();

        $model->addMediaFromUrl(asset("dist/img/user2-160x160.jpg"))
            ->toMediaCollection('users');
    }
}
