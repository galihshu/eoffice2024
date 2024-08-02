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
            ['nama_jabatan' => 'Kepala Sub Bagian Umum dan Kepegawaian'],
            ['nama_jabatan' => 'Kepala Badan'],
            ['nama_jabatan' => 'Kepala Bidang Perencanaan Anggaran Daerah'],
            ['nama_jabatan' => 'Kepala Bidang Perbendaharaan'],
            ['nama_jabatan' => 'UPTD Pusat Data & Informasi Keuangan'],
            ['nama_jabatan' => 'Kepala Sub Bidang Pengelolaan Data dan Sistem Informasi Keuangan Daerah'],
            ['nama_jabatan' => 'Kepala Sub Bagian Tata Usaha'],
            ['nama_jabatan' => 'Kepala Seksi Pengelolaan Data, Infrastruktur dan Jaringan'],
        ];
        
        DB::table('jabatan')->insert($data);
    }
}
