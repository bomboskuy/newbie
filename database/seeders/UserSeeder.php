<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $adminRoleId = DB::table('role')->where('role', 'Admin')->value('idrole');
        $adminRoleId = DB::table('role')->where('role', 'Manager')->value('idrole');
        $regularRoleId = DB::table('role')->where('role', 'Guest')->value('idrole');

        DB::table('user')->insert([
            'username' => 'Admin',
            'password' => Hash::make('12345'),
            'idrole' => $adminRoleId,
        ]);

        DB::table('user')->insert([
            'username' => 'Manager',
            'password' => Hash::make('12345'),
            'idrole' => $adminRoleId,
        ]);

        DB::table('user')->insert([
            'username' => 'Guest',
            'password' => Hash::make('12345'),
            'idrole' => $regularRoleId,
        ]);
    }
}