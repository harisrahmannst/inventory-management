<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RackSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        DB::table('racks')->insert([
            'name_rack' => "Cyber2-NF3-02-4",
            'location_id' => "2",
            'created_at' => '2023-08-24 04:52:30'
        ]);
    }
}
