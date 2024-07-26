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

        User::create([
            'name'       => 'Operator',
            'username'   => 'operator',
            'email'      => 'operator@email.com',
            'password'   => bcrypt('operator123'),
            'jabatan_id' => 1
        ])->assignRole('operator');

        User::create([
            'name'       => 'Pemberi Disposisi',
            'username'   => 'pemberidisposisi',
            'email'      => 'pemberidisposisi@email.com',
            'password'   => bcrypt('pemberidisposisi123'),
            'jabatan_id' => 2
        ])->assignRole('pemberidisposisi');
    }
}
