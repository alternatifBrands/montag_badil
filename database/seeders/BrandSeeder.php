<?php

namespace Database\Seeders;

use App\Models\City;
use App\Models\User;
use App\Models\Brand;
use App\Models\Country;
use App\Models\Category;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class BrandSeeder extends Seeder
{
    public function run(): void
    {
        $categoryIds = Category::pluck('id')->toArray();
        $userIds = User::pluck('id')->toArray();
        $countryIds = Country::pluck('id')->toArray();
        $cityIds = City::pluck('id')->toArray();
        for ($i = 0; $i < 8; $i++) {
            Brand::create([
                'name' => fake()->name(),
                'founder' => fake()->name(),
                'owner' => fake()->name(),
                'url'=>fake()->url(),
                'description'=>fake()->realText(),
                'parent_company'=>fake()->company(),
                'industry'=>fake()->name(),
                'notes'=>fake()->realText(),
                'is_alternative'=>fake()->boolean(),
                'barcode'=>fake()->countryCode(),
                'status' => fake()->randomElement(['pending', 'approved','rejected']),
                'user_id'=>fake()->randomElement($userIds),
                'country_id'=>fake()->randomElement($countryIds),
                'city_id'=>fake()->randomElement($cityIds),
                'category_id' => fake()->randomElement($categoryIds),
            ]);
        }
    }
}
