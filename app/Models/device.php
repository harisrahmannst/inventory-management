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

    public function types()
    {
        return $this->belongsTo(type::class, 'device_type_id');
    }

    public function brands()
    {
        return $this->belongsTo(brand::class, 'device_brand_id');
    }

    public function sites()
    {
        return $this->belongsTo(site::class, 'device_site_id');
    }

    public function locations()
    {
        return $this->belongsTo(location::class, 'device_location_id');
    }

    public function racks()
    {
        return $this->belongsTo(rack::class, 'device_rack_id');
    }

}
