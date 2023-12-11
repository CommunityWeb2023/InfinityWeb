<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleAndPermissionSeed extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $admin = Role::create(['name' => 'administrator', 'tooltip' => 'Administrator']);
        $gameMaster = Role::create(['name' => 'game_master', 'tooltip' => 'Game Master']);
        $support = Role::create(['name' => 'support', 'tooltip' => 'Support']);
        $user = Role::create(['name' => 'user', 'tooltip' => 'User']);

        // general permissions
        Permission::create(['name' => 'view dashboard', 'tooltip' => 'Allows the user to view the dashboard']);

        // post permissions
        Permission::create(['name' => 'create post', 'tooltip' => 'Allows the user to create a post']);
        Permission::create(['name' => 'update post', 'tooltip' => 'Allows the user to update a post']);
        Permission::create(['name' => 'delete post', 'tooltip' => 'Allows the user to delete a post']);

        // download permissions
        Permission::create(['name' => 'create download', 'tooltip' => 'Allows the user to create a download']);
        Permission::create(['name' => 'update download', 'tooltip' => 'Allows the user to update a download']);
        Permission::create(['name' => 'delete download', 'tooltip' => 'Allows the user to delete a download']);

        // faq permissions
        Permission::create(['name' => 'create faq', 'tooltip' => 'Allows the user to create a faq']);
        Permission::create(['name' => 'update faq', 'tooltip' => 'Allows the user to update a faq']);
        Permission::create(['name' => 'delete faq', 'tooltip' => 'Allows the user to delete a faq']);

        // rules permissions
        Permission::create(['name' => 'create rules', 'tooltip' => 'Allows the user to create a rules']);
        Permission::create(['name' => 'update rules', 'tooltip' => 'Allows the user to update a rules']);
        Permission::create(['name' => 'delete rules', 'tooltip' => 'Allows the user to delete a rules']);

        // guides permissions
        Permission::create(['name' => 'create guides', 'tooltip' => 'Allows the user to create a guides']);
        Permission::create(['name' => 'update guides', 'tooltip' => 'Allows the user to update a guides']);
        Permission::create(['name' => 'delete guides', 'tooltip' => 'Allows the user to delete a guides']);

        // shop category permissions
        Permission::create(['name' => 'create shop category', 'tooltip' => 'Allows the user to create a shop category']);
        Permission::create(['name' => 'update shop category', 'tooltip' => 'Allows the user to update a shop category']);
        Permission::create(['name' => 'delete shop category', 'tooltip' => 'Allows the user to delete a shop category']);

        // shop item permissions
        Permission::create(['name' => 'create shop item', 'tooltip' => 'Allows the user to create a shop item']);
        Permission::create(['name' => 'update shop item', 'tooltip' => 'Allows the user to update a shop item']);
        Permission::create(['name' => 'delete shop item', 'tooltip' => 'Allows the user to delete a shop item']);

        // payment permissions
        Permission::create(['name' => 'create payment', 'tooltip' => 'Allows the user to create a payment']);
        Permission::create(['name' => 'update payment', 'tooltip' => 'Allows the user to update a payment']);
        Permission::create(['name' => 'delete payment', 'tooltip' => 'Allows the user to delete a payment']);

        // search engine permissions
        Permission::create(['name' => 'search web accounts', 'tooltip' => 'Allows the user to search web accounts']);
        Permission::create(['name' => 'search game accounts', 'tooltip' => 'Allows the user to search game accounts']);
        Permission::create(['name' => 'search characters', 'tooltip' => 'Allows the user to search characters']);
        Permission::create(['name' => 'search guilds', 'tooltip' => 'Allows the user to search guilds']);

        // user permissions
        Permission::create(['name' => 'create user', 'tooltip' => 'Allows the user to create a user']);
        Permission::create(['name' => 'update user', 'tooltip' => 'Allows the user to update a user']);
        Permission::create(['name' => 'delete user', 'tooltip' => 'Allows the user to delete a user']);

        // role permissions
        Permission::create(['name' => 'create role', 'tooltip' => 'Allows the user to create a role']);
        Permission::create(['name' => 'update role', 'tooltip' => 'Allows the user to update a role']);
        Permission::create(['name' => 'delete role', 'tooltip' => 'Allows the user to delete a role']);

        // give role $admin all permissions
        $admin->givePermissionTo(Permission::all());

        // give role $gameMaster permissions for view dashboard, search web accounts, search game accounts, search characters, search guilds
        $gameMaster->givePermissionTo([
            'view dashboard',
            'search web accounts',
            'search game accounts',
            'search characters',
            'search guilds',
        ]);

        // give role $support permissions for view dashboard, search web accounts, search game accounts, search characters, search guilds
        $support->givePermissionTo([
            'view dashboard',
            'search web accounts',
            'search game accounts',
            'search characters',
            'search guilds',
        ]);


    }
}
