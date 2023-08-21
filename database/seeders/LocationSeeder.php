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
            'site_id' => "2"
        ]);

        DB::table('locations')->insert([
            'name_location' => "Cyber 2",
            'site_id' => "1"

        ]);

        DB::table('locations')->insert([
            'name_location' => "GE Ruko",
            'site_id' => "3"
        ]);
    }
}
