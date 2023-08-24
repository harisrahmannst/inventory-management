<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class rack extends Model
{
    use HasFactory;


    public function devices()
    {
        return $this->hasMany(device::class);
    }
}
