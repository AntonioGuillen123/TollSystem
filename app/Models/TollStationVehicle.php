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

    public function vehicle(){
        return $this->belongsTo(Vehicle::class);
    }

    public function tollStation(){
        return $this->belongsTo(TollStation::class);
    }

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

        static::created(function (TollStationVehicle $tollStationVehicle) {
            $ticket = $tollStationVehicle->attributes;

            $tollStation = TollStation::find($ticket['toll_station_id']);

            $tollStation->station_value += $ticket['toll_value'];

            $tollStation->save(); // Necesario de usar el save ya que no estoy utilizando create() o update(), lo estoy actualizando manualmente
        });
    }
}
