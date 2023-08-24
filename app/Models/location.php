<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class location extends Model
{
    use HasFactory;

<<<<<<< HEAD
    public function devices()
    {
        return $this->hasMany(device::class);
=======
    protected $fillable = [
        'name_location',
        'site_id'
    ];

    public function site()
    {
        return $this->belongsTo(Site::class);
>>>>>>> 1dab9d39d5dda9e123c84603199ed048c26086a0
    }
}
