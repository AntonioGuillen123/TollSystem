<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Vehicle;

class TollStation extends Model
{
    protected $table = 'toll_station';

    protected $fillable = [
        'name',
        'city',
        'station_value'
    ];

    public function vehicles()
    {
        return $this->belongsToMany(Vehicle::class)
            ->as('tickets')
            ->withTimestamps();
    }
}
