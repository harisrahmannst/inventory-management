<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class rack extends Model
{
    use HasFactory;

    protected $fillable = [
        'name_rack',
        'location_id'
    ];

    public function location()
    {
        return $this->belongsTo(location::class);
    }

    public function devices()
    {
        return $this->hasMany(device::class);
    }
}
