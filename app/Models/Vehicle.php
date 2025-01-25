<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\VehicleType;
use App\Models\TollStation;
use App\Models\TollStationVehicle;

class Vehicle extends Model
{
    protected $table = 'vehicle';

    protected $fillable = [
        'tuition',
        'axle',
        'vehicle_type_id'
    ];

    public function vehicleType()
    {
        return $this->belongsTo(VehicleType::class);
    }

    public function tollStations()
    {
        return $this->belongsToMany(TollStation::class)
            ->as('ticket')
            ->using(TollStationVehicle::class)
            ->withTimestamps();
    }
}
