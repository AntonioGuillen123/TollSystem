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

    public function vehicle()
    {
        return $this->belongsTo(Vehicle::class);
    }

    public function tollStation()
    {
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

    public function scopeGetVehiclesGroupedById($query, $id)
    { // Query Scope para que en cualquier lado de la app se pueda hacer esta consulta, funciona como cualquier función de SQL
        return $query->with(['vehicle', 'vehicle.vehicleType'])
            ->where('toll_station_id', $id)
            ->groupBy('toll_station_id', 'vehicle_id', 'toll_value')
            ->selectRaw('vehicle_id, toll_value, COUNT(*) as totalCount');
    }

    public function scopeGetTollsGroupedById($query, $id)
    {
        return $query->with('tollStation')
            ->where('vehicle_id', $id)
            ->groupBy('toll_station_id', 'vehicle_id', 'toll_value')
            ->selectRaw('toll_station_id, toll_value, COUNT(*) as totalCount');
    }
}
