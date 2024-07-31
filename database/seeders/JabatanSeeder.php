<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class JabatanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            ['nama_jabatan' => 'Staff Tata Usaha'],
            ['nama_jabatan' => 'Kepala Badan'],
            ['nama_jabatan' => 'Kepala Bidang Perencanaan Anggaran Daerah'],
            ['nama_jabatan' => 'Kepala Bidang Perbendaharaan'],
            ['nama_jabatan' => 'UPTD Pusat Data & Informasi Keuangan'],
        ];
        
        DB::table('jabatan')->insert($data);
    }
}
