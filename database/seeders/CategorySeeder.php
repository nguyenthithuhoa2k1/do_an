<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Category;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Category::truncate();
        $category = [
            ['category' => 'Áo thun'],
            ['category' => 'Áo dạ'],
            ['category' => 'Quần ngắn'],
            ['category' => 'Quần dài'],
            ['category' => 'Áo lông'],
            ['category' => 'Váy'],
            ['category' => 'Đầm'],
        ];
        Category::insert($category);
    }
}


