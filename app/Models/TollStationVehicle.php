<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\Pivot;

class TollStationVehicle extends Pivot
{
    private const SPECIALTYPEOFVEHICLE = 'Truck';

    protected $table = 'toll_station_vehicle';

    protected $fillable = [
        'toll_station_id',
        'vehicle_id',
        'toll_value'
    ];

    public $incrementing = true;

    protected static function booted()
    {
        static::creating(function (TollStationVehicle $tollStationVehicle) {
            $ticket = $tollStationVehicle->attributes;
            
            $vehicle = Vehicle::find($ticket['vehicle_id']);

            $vehicleType = $vehicle->vehicleType;
            $baseFee = $vehicleType->base_fee;

            $tollStationVehicle->attributes['toll_value'] = $vehicleType->type === self::SPECIALTYPEOFVEHICLE
                ? $baseFee * $vehicle->axle
                : $baseFee;
        });
    }
}
