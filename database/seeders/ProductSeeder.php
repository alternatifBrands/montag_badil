<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Brand;
use App\Models\Product;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ProductSeeder extends Seeder
{
    public function run(): void
    {
        $userIds = User::pluck('id')->toArray();
        $brandIds = Brand::pluck('id')->toArray();
        for ($i = 0; $i < 11; $i++) {
            Product::create([
                'name' => fake()->name(),
                'description'=>fake()->realText(),
                'notes'=>fake()->realText(),
                'barcode'=>fake()->countryCode(),
                'status' => fake()->randomElement(['pending', 'approved','rejected']),
                'is_alternative'=>fake()->boolean(),
                'user_id'=>fake()->randomElement($userIds),
                'brand_id' => fake()->randomElement($brandIds),
            ]);
        }
    }
}
