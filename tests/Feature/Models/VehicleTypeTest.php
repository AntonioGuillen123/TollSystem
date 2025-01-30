<?php

namespace Tests\Feature;

use App\Models\Vehicle;
use App\Models\VehicleType;
use Database\Seeders\TestSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class VehicleTypeTest extends TestCase
{
    use RefreshDatabase;

    public function test_CheckIfAxlesNotNull()
    {
        $this->seed(TestSeeder::class);

        $vehicleType = VehicleType::find(3);

        $this->assertInstanceOf(Vehicle::class, $vehicleType->vehicles[0]);
    }
}
