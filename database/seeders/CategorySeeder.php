<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;

class CategorySeeder extends Seeder
{
    public function run()
    {
        Category::insert([
            [
                'name' => 'Indoor Plants',
                'slug' => 'indoor-plants',
                'description' => 'Tanaman hias untuk dalam ruangan',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Outdoor Plants',
                'slug' => 'outdoor-plants',
                'description' => 'Tanaman hias untuk luar ruangan',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
