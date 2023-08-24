<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LocationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        DB::table('locations')->insert([
            'name_location' => "EDII Office",
            'site_id' => "2",
            'created_at' => '2023-08-24 04:52:30'
        ]);

        DB::table('locations')->insert([
            'name_location' => "Cyber 2",
            'site_id' => "1",
            'created_at' => '2023-08-24 04:52:30'


        ]);

        DB::table('locations')->insert([
            'name_location' => "GE Ruko",
            'site_id' => "3",
            'created_at' => '2023-08-24 04:52:30'
        ]);
    }
}
