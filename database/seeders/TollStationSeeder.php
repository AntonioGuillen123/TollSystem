<?php

namespace Database\Seeders;

use App\Models\TollStation;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TollStationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $tollStations = [
            ['name' => 'Toll Station A', 'city' => 'New York', 'station_value' => 750],
            ['name' => 'Toll Station B', 'city' => 'Los Angeles', 'station_value' => 550],
            ['name' => 'Toll Station C', 'city' => 'Chicago', 'station_value' => 750],
            ['name' => 'Toll Station D', 'city' => 'Houston', 'station_value' => 550],
            ['name' => 'Toll Station E', 'city' => 'Miami', 'station_value' => 400],
            ['name' => 'Toll Station F', 'city' => 'Dallas', 'station_value' => 450],
            ['name' => 'Toll Station G', 'city' => 'Atlanta', 'station_value' => 150],
            ['name' => 'Toll Station H', 'city' => 'Seattle', 'station_value' => 150],
            ['name' => 'Toll Station I', 'city' => 'Denver', 'station_value' => 1150],
            ['name' => 'Toll Station J', 'city' => 'San Francisco', 'station_value' => 900]
        ];

        foreach ($tollStations as $tollStation) {
            TollStation::create($tollStation);
        }
    }
}
