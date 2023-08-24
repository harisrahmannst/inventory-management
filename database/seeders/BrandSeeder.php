<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BrandSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        DB::table('brands')->insert([
            'name_brand' => "CISCO",
            'created_at' => '2023-08-24 04:52:30'
        ]);

        DB::table('brands')->insert([
            'name_brand' => "HPE",
            'created_at' => '2023-08-24 04:52:30'
        ]);

        DB::table('brands')->insert([
            'name_brand' => "Dell",
            'created_at' => '2023-08-24 04:52:30'
        ]);
    }
}
