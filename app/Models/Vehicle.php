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
            ->withPivot('toll_value')
            ->withTimestamps();
    }

    public function getAxles()
    {
        $axles = $this->axle;

        $result = 'Without Axles';

        if ($axles) {
            $result = $axles . ' Axles';
        }

        return $result;
    }

    public function getTicket()
    {
        $axle = $this->axle ?? 1;

        $baseFee = $this->vehicleType->base_fee;

        $ticket = $axle * $baseFee;

        return $ticket;
    }
}
