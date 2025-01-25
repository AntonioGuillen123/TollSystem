<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Vehicle;

class VehicleType extends Model
{
    protected $table = 'vehicle_type';

    protected $fillable = [
        'type',
        'value'
    ];

    public function vehicles()
    {
        return $this->hasMany(Vehicle::class);
    }
}
