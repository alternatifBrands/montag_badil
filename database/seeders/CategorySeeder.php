<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CategorySeeder extends Seeder
{
    public function run(): void
    {
        for ($i = 0; $i < 12; $i++) {
            Category::create([
                'name' => fake()->name(),
            ]);
        }
    }
}
