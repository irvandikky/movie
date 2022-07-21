<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $category = [
            [
                'name' => 'Now Playing',
            ],
            [
                'name' => 'Popular',
            ],
            [
                'name' => 'Top Rated',
            ],
            [
                'name' => 'Up Coming',
            ],
        ];

        Category::insert($category);
    }
}
