<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class VehicleType extends Model
{
    protected $table = 'vehicle_type';

    protected $fillable = [
        'type',
        'value',
        'axle'
    ];
}
