<?php

namespace Database\Seeders;

use Flyff\Modules\Post\Models\Post;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

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
    }
}
