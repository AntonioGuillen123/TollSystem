<?php

namespace Tests\Feature;

use App\Models\TollStationVehicle;
use App\Models\Vehicle;
use Database\Seeders\TestSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class VehicleTest extends TestCase
{
    use RefreshDatabase;

    public function test_CheckIfVehicleViewIsLoadedWithData()
    {
        $this->seed(TestSeeder::class);

        $data = [
            'vehicle' => Vehicle::find(1),
            'tolls' => TollStationVehicle::getTollsGroupedById(1)->get()
        ];

        $response = $this->get(route('showVehicle', 1));

        $response
            ->assertStatus(200)
            ->assertViewIs('showVehicle')
            ->assertViewHasAll($data);
    }

    public function test_CheckIfRedirectWhenVehicleViewIsLoaded()
    {
        $this->seed(TestSeeder::class);

        $response = $this->get(route('showVehicle', -1));

        $response
            ->assertRedirect(route('home'));
    }
}
