<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SubLevelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $sublevel = [
            ['level_id' => 1, 'sublevel' => 'Sekretariat'],
            ['level_id' => 2, 'sublevel'=> 'Kasubag Umum'] 
        ];

        DB::table('sublevel')->insert($sublevel);
    }
}
