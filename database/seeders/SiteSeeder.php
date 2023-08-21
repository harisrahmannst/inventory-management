<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SiteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        DB::table('sites')->insert([
            'name_site' => "Data Center",
        ]);

        DB::table('sites')->insert([
            'name_site' => "Disaster Recovery Center",
        ]);

        DB::table('sites')->insert([
            'name_site' => "Client",
        ]);
      
    }
}
