<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class device extends Model
{
    use HasFactory;

    protected $fillable = [
        'device_name',
        'device_brand_id',
        'serial_number',
        'device_type_id',
        'device_site_id',
        'device_location_id',
        'device_rack_id',
        'device_status',
        'device_describtion',
        'device_image',
    ];
}
