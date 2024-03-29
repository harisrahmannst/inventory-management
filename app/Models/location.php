<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class location extends Model
{
    use HasFactory;

    protected $fillable = [
        'name_location',
        'site_id'
    ];

    public function site()
    {
        return $this->belongsTo(site::class);
    }
}
