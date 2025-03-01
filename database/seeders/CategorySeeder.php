<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    
    public function run()
    {
        Category::create([
            'name' => 'Computer',
            'slug'=>'dell'
        ]);
        Category::create([
            'name' => 'Laptop',
            'slug'=>'dell'
        ]);;
        Category::create([
            'name' => 'PC Components',
            'slug'=>'dell'
        ]);
    }
}