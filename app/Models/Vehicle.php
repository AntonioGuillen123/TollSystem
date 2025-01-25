<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\VehicleType;
use App\Models\TollStation;

class Vehicle extends Model
{
    protected $table = 'vehicle';

    protected $fillable = [
        'tuition',
        'vehicle_type'
    ];

    public function vehicleType()
    {
        return $this->belongsTo(VehicleType::class);
    }

    public function tollStations()
    {
        return $this->belongsToMany(TollStation::class)
            ->as('tickets')
            ->withTimestamps();
    }
}
