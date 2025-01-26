<?php

namespace Database\Seeders;

use App\Models\TollStationVehicle;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TollStationVehicleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $vehicleTollStations = [
            ['vehicle_id' => 1, 'toll_station_id' => 1],    // Car -> $100
            ['vehicle_id' => 1, 'toll_station_id' => 1],    // Car -> $100 (repetido)
            ['vehicle_id' => 2, 'toll_station_id' => 2],     // Motorbike -> $50
            ['vehicle_id' => 3, 'toll_station_id' => 3],    // Truck (6 axles) -> $50 * 6 = $300
            ['vehicle_id' => 4, 'toll_station_id' => 4],    // Car -> $100
            ['vehicle_id' => 5, 'toll_station_id' => 5],     // Motorbike -> $50
            ['vehicle_id' => 5, 'toll_station_id' => 5],     // Motorbike -> $50 (repetido)
            ['vehicle_id' => 6, 'toll_station_id' => 6],    // Truck (8 axles) -> $50 * 8 = $400
            ['vehicle_id' => 7, 'toll_station_id' => 7],    // Car -> $100
            ['vehicle_id' => 8, 'toll_station_id' => 8],     // Motorbike -> $50
            ['vehicle_id' => 9, 'toll_station_id' => 9],    // Truck (10 axles) -> $50 * 10 = $500
            ['vehicle_id' => 9, 'toll_station_id' => 9],    // Truck (10 axles) -> $50 * 10 = $500 (repetido)
            ['vehicle_id' => 10, 'toll_station_id' => 10],  // Car -> $100
            ['vehicle_id' => 1, 'toll_station_id' => 3],    // Car -> $100
            ['vehicle_id' => 2, 'toll_station_id' => 6],     // Motorbike -> $50
            ['vehicle_id' => 3, 'toll_station_id' => 5],    // Truck (6 axles) -> $50 * 6 = $300
            ['vehicle_id' => 4, 'toll_station_id' => 7],    // Car -> $100
            ['vehicle_id' => 5, 'toll_station_id' => 9],     // Motorbike -> $50
            ['vehicle_id' => 6, 'toll_station_id' => 2],    // Truck (8 axles) -> $50 * 8 = $400
            ['vehicle_id' => 7, 'toll_station_id' => 8],    // Car -> $100
            ['vehicle_id' => 8, 'toll_station_id' => 1],     // Motorbike -> $50
            ['vehicle_id' => 9, 'toll_station_id' => 10],   // Truck (10 axles) -> $50 * 10 = $500
            ['vehicle_id' => 10, 'toll_station_id' => 4],   // Car -> $100
            ['vehicle_id' => 1, 'toll_station_id' => 5],    // Car -> $100
            ['vehicle_id' => 2, 'toll_station_id' => 8],     // Motorbike -> $50
            ['vehicle_id' => 3, 'toll_station_id' => 10],   // Truck (6 axles) -> $50 * 6 = $300
            ['vehicle_id' => 4, 'toll_station_id' => 2],    // Car -> $100
            ['vehicle_id' => 5, 'toll_station_id' => 7],     // Motorbike -> $50
            ['vehicle_id' => 6, 'toll_station_id' => 4],    // Truck (8 axles) -> $50 * 8 = $400
            ['vehicle_id' => 7, 'toll_station_id' => 9],    // Car -> $100
            ['vehicle_id' => 8, 'toll_station_id' => 6],     // Motorbike -> $50
            ['vehicle_id' => 9, 'toll_station_id' => 1],    // Truck (10 axles) -> $50 * 10 = $500
            ['vehicle_id' => 10, 'toll_station_id' => 3]    // Car -> $100
        ];

        foreach ($vehicleTollStations as $vehicleTollStation) {
            TollStationVehicle::create($vehicleTollStation);
        }
    }
}
