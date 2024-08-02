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
        // photo null 
        User::create([
            'name'       => 'Administrator',
            'username'   => 'admin',
            'email'      => 'admin@email.com',
            'password'   => bcrypt('admin123'),
            "photo" => 'eofficeadmin/images/authentication/default.png',
        ])->assignRole('admin');

        User::create([
            'name'       => 'Muhammad Herwan, S.E., M.M.',
            'username'   => 'operator',
            'email'      => 'operator@email.com',
            'password'   => bcrypt('operator123'),
            "photo" => 'eofficeadmin/images/authentication/default.png',
            'jabatan_id' => 1
        ])->assignRole('operator');

        User::create([
            'name'       => 'Dr. Marindo Kurniawan',
            'username'   => 'kaban',
            'email'      => 'kaban@email.com',
            'password'   => bcrypt('pemberidisposisi123'),
            "photo" => 'eofficeadmin/images/authentication/default.png',
            'jabatan_id' => 2
        ])->assignRole('pemberidisposisi');
        
        User::create([
            'name'       => 'Mughni Emirhan, S.I.P., M.M.',
            'username'   => 'anggaran',
            'email'      => 'anggaran@email.com',
            'password'   => bcrypt('anggaran123'),
            "photo" => 'eofficeadmin/images/authentication/default.png',
            'jabatan_id' => 3
        ])->assignRole('penanggungjawab');
        
        User::create([
            'name'       => 'Sri Wahyuni, S.Sos., M.M.',
            'username'   => 'perbendaharaan',
            'email'      => 'perbendaharaan@email.com',
            'password'   => bcrypt('perbendaharaan123'),
            "photo" => 'eofficeadmin/images/authentication/default.png',
            'jabatan_id' => 4
        ])->assignRole('penanggungjawab');

        User::create([
            'name'       => 'Weda Helmina, S.E., M.M.',
            'username'   => 'pusdatin',
            'email'      => 'pusdatin@email.com',
            'password'   => bcrypt('pusdatin123'),
            "photo" => 'eofficeadmin/images/authentication/default.png',
            'jabatan_id' => 5
        ])->assignRole('penanggungjawab');

        User::create([
            'name'       => 'M Nuruddin Adhitama Putra S.H., M.H.',
            'username'   => 'kasubidit',
            'email'      => 'kasubidit@email.com',
            'password'   => bcrypt('kasubidit123'),
            'jabatan_id' => 6
        ])->assignRole('pelaksana');

        User::create([
            'name'       => 'Ari Ben Lahan',
            'username'   => 'kasubiddata',
            'email'      => 'kasubiddata@email.com',
            'password'   => bcrypt('kasubiddata123'),
            'jabatan_id' => 6
        ])->assignRole('pelaksana');
        
        User::create([
            'name'       => 'Ari Sartika, S.H., M.H',
            'username'   => 'kasubidtu',
            'email'      => 'kasubidtu@email.com',
            'password'   => bcrypt('kasubidtu123'),
            'jabatan_id' => 6
        ])->assignRole('pelaksana');

    }
}
