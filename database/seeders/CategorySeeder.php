<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    public function run()
    {
        Category::create(['name'=>'Áo Polo']);
        Category::create(['name' => 'Áo Khoắc']);
        Category::create(['name' => 'Quần JEAN']);
    }
}
