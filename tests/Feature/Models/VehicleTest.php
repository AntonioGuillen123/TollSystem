<?php

namespace Tests\Feature\Models;

use App\Models\Vehicle;
use Database\Seeders\TestSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class VehicleTest extends TestCase
{
    use RefreshDatabase;

    public function test_CheckIfAxlesNotNull()
    {
        $this->seed(TestSeeder::class);

        $vehicle = Vehicle::find(3);

        $message = $vehicle->axle . ' Axles';
        $axlesText = $vehicle->getAxles();

        $this->assertTrue($axlesText === $message);
    }
}
