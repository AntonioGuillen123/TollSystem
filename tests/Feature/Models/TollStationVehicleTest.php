<?php

namespace Tests\Feature\Models;

use App\Models\TollStationVehicle;
use App\Models\TollStation;
use App\Models\Vehicle;
use Database\Seeders\DatabaseSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class TollStationVehicleTest extends TestCase
{
    use RefreshDatabase;

    public function test_CheckIfTollStationVehicleHasVehicleRelationship()
    {
        $this->seed(DatabaseSeeder::class);

        $tollStationVehicle = TollStationVehicle::find(1);

        $this->assertInstanceOf(Vehicle::class, $tollStationVehicle->vehicle);
    }

    public function test_CheckIfTollStationVehicleHasTollStationRelationship()
    {
        $this->seed(DatabaseSeeder::class);

        $tollStationVehicle = TollStationVehicle::find(1);

        $this->assertInstanceOf(TollStation::class, $tollStationVehicle->tollStation);
    }
}
