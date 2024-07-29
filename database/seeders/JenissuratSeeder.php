<?php

namespace Database\Seeders;

use Illuminate\Database\Console\DbCommand;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class JenisSuratSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            ['jenis_surat' => 'Surat Pemberitahuan'],
            ['jenis_surat' => 'Surat Edaran'],
            ['jenis_surat' => 'Surat Permohonan'],
            ['jenis_surat' => 'Surat Izin'],
            ['jenis_surat' => 'Nota Dinas']
        ];
        
        DB::table('jenis_surat')->insert($data);
    }
}
