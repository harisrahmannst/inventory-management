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
        ]);

        DB::table('types')->insert([
            'name_type' => "Storage",
        ]);

        DB::table('types')->insert([
            'name_type' => "Router",
        ]);

        DB::table('types')->insert([
            'name_type' => "Switch",
        ]);
    }
}
