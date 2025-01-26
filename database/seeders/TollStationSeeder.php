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
            ['name' => 'Toll Station A', 'city' => 'New York'],
            ['name' => 'Toll Station B', 'city' => 'Los Angeles'],
            ['name' => 'Toll Station C', 'city' => 'Chicago'],
            ['name' => 'Toll Station D', 'city' => 'Houston'],
            ['name' => 'Toll Station E', 'city' => 'Miami'],
            ['name' => 'Toll Station F', 'city' => 'Dallas'],
            ['name' => 'Toll Station G', 'city' => 'Atlanta'],
            ['name' => 'Toll Station H', 'city' => 'Seattle'],
            ['name' => 'Toll Station I', 'city' => 'Denver'],
            ['name' => 'Toll Station J', 'city' => 'San Francisco']
        ];

        foreach ($tollStations as $tollStation) {
            TollStation::create($tollStation);
        }
    }
}
