<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        DB::table('types')->insert([
            'name_type' => "Server",
            'created_at' => '2023-08-24 04:52:30'
        ]);

        DB::table('types')->insert([
            'name_type' => "Storage",
            'created_at' => '2023-08-24 04:52:30'
        ]);

        DB::table('types')->insert([
            'name_type' => "Router",
            'created_at' => '2023-08-24 04:52:30'
        ]);

        DB::table('types')->insert([
            'name_type' => "Switch",
            'created_at' => '2023-08-24 04:52:30'
        ]);
    }
}
