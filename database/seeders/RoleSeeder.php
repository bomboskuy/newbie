<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Insert three types of users: Admin, Manager and Guest User

        DB::table('role')->insert([
            [
                'role' => 'Admin',
            ],
            [
                'role' => 'Manager',
            ],
            [
                'role' => 'Guest',
            ],
        ]);
    }
}