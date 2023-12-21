<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $isDemo = config('app.demo');

        $this->call(DefaultSettingSeed::class);
        $this->call(RoleAndPermissionSeed::class);
        $this->call(PostCategorySeed::class);

        if ( $isDemo ){
            $this->call(AuthSeed::class);
            $this->call(ContentSeed::class);
            $this->call(VoteSettingSeed::class);
        }

    }
}
