<?php

namespace Database\Seeders;

use App\Models\User;
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
        $admin = User::create([
            'name'       => 'Administrator',
            'username'   => 'admin',
            'email'      => 'admin@email.com',
            'password'   => bcrypt('admin123'),
        ])->assignRole('admin');

        // Jacob Thornton

        User::create([
            'name'       => 'Operator',
            'username'   => 'operator',
            'email'      => 'operator@email.com',
            'password'   => bcrypt('operator123'),
        ])->assignRole('operator');
    }
}
