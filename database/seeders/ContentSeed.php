<?php

namespace Database\Seeders;

use Flyff\Modules\Post\Models\Post;
use Illuminate\Database\Seeder;

class ContentSeed extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = \Faker\Factory::create();
        for ($i = 0; $i < 15; $i++) {
            Post::create([
                'title' => $faker->text(10),
                'content' => $faker->text(rand(500, 10000)),
                'category_id' => 1,
                'user_id' => 1,
                'published_at' => now(),
                'image' => 'https://source.unsplash.com/featured/?fantasy,' . rand(1, 99999999),
            ]);
        }
    }
}
