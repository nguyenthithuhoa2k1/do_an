<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Brand;

class BrandSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Brand::truncate();
        $brand = [
            ['brand' => 'Gucci'],
            ['brand' => 'Dior'],
            ['brand' => 'Chanel'],
            ['brand' => 'YSl'],
        ];
        Brand::insert($brand);
    }
}
