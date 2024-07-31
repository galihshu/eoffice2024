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
            'name'       => 'Staff TU',
            'username'   => 'operator',
            'email'      => 'operator@email.com',
            'password'   => bcrypt('operator123'),
            'jabatan_id' => 1
        ])->assignRole('operator');

        User::create([
            'name'       => 'Kepala Kaban',
            'username'   => 'Dr. Marindo Kurniawan',
            'email'      => 'kaban@email.com',
            'password'   => bcrypt('pemberidisposisi123'),
            'jabatan_id' => 2
        ])->assignRole('pemberidisposisi');
        
        User::create([
            'name'       => 'Mughni Emirhan, S.I.P., M.M.',
            'username'   => 'anggaran',
            'email'      => 'anggaran@email.com',
            'password'   => bcrypt('anggaran123'),
            'jabatan_id' => 3
        ])->assignRole('penanggungjawab');
        
        User::create([
            'name'       => 'Sri Wahyuni, S.Sos., M.M.',
            'username'   => 'perbendaharaan',
            'email'      => 'perbendaharaan@email.com',
            'password'   => bcrypt('perbendaharaan123'),
            'jabatan_id' => 4
        ])->assignRole('penanggungjawab');

        User::create([
            'name'       => 'Weda Helmina, S.E., M.M.',
            'username'   => 'pusdatin',
            'email'      => 'pusdatin@email.com',
            'password'   => bcrypt('pusdatin123'),
            'jabatan_id' => 5
        ])->assignRole('penanggungjawab');
    }
}
