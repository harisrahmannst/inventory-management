<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DeviceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //


        DB::table('devices')->insert([
            'device_name' => "Simplivity-10.198",
            'device_type_id' => "1",
            'device_brand_id' => "2",
            'serial_number' => "SHT835KZ0S",
            'device_site_id' => "1",
            'device_location_id' => "2",
            'device_rack_id' => "1",
            'device_status' => "Digunakan",
            'device_image' => "",
            'device_describtion' => "Intel Xeon-Gold 6238 (2.1GHz/22-core/140W) FIO Processor Kit for HPE ProLiant DL380 Gen10, HPE SimpliVity 768GB (12x64GB) DDR4-2933 Registered Memory Kit, HPE 300GB SAS 12G Mission Critical 10K SFF SC 3-year Warranty Multi Vendor HDD",
            'qrcode' => "",
        ]);

        DB::table('devices')->insert([
            'device_name' => "Simplivity-10.190",
            'device_type_id' => "3",
            'device_brand_id' => "2",
            'serial_number' => "SHT835KZ0S",
            'device_site_id' => "2",
            'device_location_id' => "1",
            'device_rack_id' => "2",
            'device_status' => "Digunakan",
            'device_image' => "",
            'device_describtion' => "Memory Besar",
            'qrcode' => "",
        ]);

        DB::table('devices')->insert([
            'device_name' => "Simplivity-10.191",
            'device_type_id' => "2",
            'device_brand_id' => "2",
            'serial_number' => "SHT835KZ0S",
            'device_site_id' => "2",
            'device_location_id' => "1",
            'device_rack_id' => "2",
            'device_status' => "Digunakan",
            'device_image' => "",
            'device_describtion' => "Memory Besar",
            'qrcode' => "",
        ]);
    }
}
