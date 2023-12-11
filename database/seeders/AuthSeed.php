<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AuthSeed extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $admin = User::create([
            'username' => 'Administrator',
            'email' => 'admin@community-web.eu',
            'password' => bcrypt('Password1234!?'),
        ]);

        $admin->assignRole('administrator');

        $gameMaster = User::create([
            'username' => 'GameMaster',
            'email' => 'gamemaster@community-web.eu',
            'password' => bcrypt('Password1234!?'),
        ]);

        $gameMaster->assignRole('game_master');

        $support = User::create([
            'username' => 'Support',
            'email' => 'support@community-web.eu',
            'password' => bcrypt('Password1234!?'),
        ]);

        $support->assignRole('support');

        $user = User::create([
            'username' => 'User',
            'email' => 'user@community-web.eu',
            'password' => bcrypt('Password1234!?'),
        ]);

        $user->assignRole('user');
    }
}
