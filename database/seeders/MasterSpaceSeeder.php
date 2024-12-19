<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class MasterSpaceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('master_space')->insert([
            'name_space'  => 'Kumpul',
            'area'  => 26,
            'capacity' => 10,
            'description' => 'Kumpul berarti berkumpul bersama.',
        ]);
    }
}
