<?php

namespace Database\Seeders;


use Flyff\Modules\Settings\Models\Setting;
use Illuminate\Database\Seeder;

class DefaultSettingSeed extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Setting::create([
            'title' => 'Community Web',
            'slogan' => 'Community Web',
            'description' => 'Community Web',

            'logo' => 'logo.png',
            'exp_rate' => 0,
            'drop_rate' => 0,
            'penya_rate' => 0,

            'discord' => 'https://discord.gg/xxxx',
            'facebook' => 'https://facebook.com/xxxx',
            'youtube' => 'https://youtube.com/xxxx',
            'twitter' => 'https://twitter.com/xxxx',
        ]);
    }
}
