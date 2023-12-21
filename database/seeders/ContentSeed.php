<?php

namespace Database\Seeders;


use Flyff\Modules\Post\Models\Post;
use Flyff\Modules\Shop\Models\ShopCategory;
use Illuminate\Database\Seeder;

class ContentSeed extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        for ($i = 0; $i < 15; $i++) {
            // generate random language code
            $language = null;
            if($i % 2 == 0)
                $language = 'en_US';

            else
                $language = 'de_DE';

            $faker = \Faker\Factory::create($language);

            Post::create([
                'title' => $faker->realText(rand(30, 45)),
                'content' => $faker->realText(rand(3000, 10000)),
                'category_id' => 1,
                'user_id' => 1,
                'published_at' => now(),
            ]);
        }


        ShopCategory::create([
            'name' => 'CS Items',
            'description' => 'Test Description',
            'position' => 1,
            'active' => true,
        ]);

        ShopCategory::create([
            'name' => 'Accessories',
            'description' => 'Test Description',
            'position' => 1,
            'active' => true,
        ]);

        ShopCategory::create([
            'name' => 'Mounts',
            'description' => 'Test Description',
            'position' => 1,
            'active' => true,
        ]);

        ShopCategory::create([
            'name' => 'Pets',
            'description' => 'Test Description',
            'position' => 1,
            'active' => true,
        ]);
    }
}
