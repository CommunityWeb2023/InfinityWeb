<?php

namespace Database\Seeders;

use Flyff\Modules\Post\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PostCategorySeed extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Category::create([
            'name' => 'News',
            'bgColor' => 'bg-blue-500',
            'textColor' => 'text-white',
        ]);

        Category::create([
            'name' => 'Events',
            'bgColor' => 'bg-green-500',
            'textColor' => 'text-white',
        ]);

        Category::create([
            'name' => 'Maintenance',
            'bgColor' => 'bg-yellow-500',
            'textColor' => 'text-white',
        ]);

    }
}
