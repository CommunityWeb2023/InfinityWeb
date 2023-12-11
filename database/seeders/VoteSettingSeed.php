<?php

namespace Database\Seeders;

use Flyff\Modules\Vote\Models\VoteSetting;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class VoteSettingSeed extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        VoteSetting::create([
            'site' => 'GTOP100',
            'need_username' => true,
            'description' => 'Vote for us on GTOP100',
            'url' => 'https://gtop100.com/topsites/Flyff/sitedetails/NovisCMS-89314?vote=1',
            'image' => 'https://gtop100.com/assets/images/votebutton.jpg',
            'active' => 1,
            'position' => 1,
            'votepoints' => 100,
            'ping_back_key' => 'gtop100',
        ]);
    }
}
