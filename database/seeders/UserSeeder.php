<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = [
            ['name' => 'Admin', 'email' => 'admin@mail.com', 'password' => bcrypt('admin123')],
            ['name' => 'Operator', 'email' => 'operator@mail.com', 'password' => bcrypt('operator123')],
        ];
        DB::table('users')->insert($users);
    }
}
