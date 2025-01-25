<?php

namespace Database\Seeders;

use App\Models\TollStation;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Database\Seeders\TollStationSeeder;
use Database\Seeders\VehicleTypeSeeder;
use Database\Seeders\VehicleSeeder;
use Database\Seeders\TollStationVehicleSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            TollStationSeeder::class,
            VehicleTypeSeeder::class,
            VehicleSeeder::class,
            TollStationVehicleSeeder::class,
        ]);
    }
}
