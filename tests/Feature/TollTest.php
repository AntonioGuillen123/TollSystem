<?php

namespace Tests\Feature;

use App\Models\TollStation;
use App\Models\TollStationVehicle;
use Database\Seeders\TestSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class TollTest extends TestCase
{
    use RefreshDatabase;

    public function test_CheckIfTollViewIsLoadedWithData()
    {
        $this->seed(TestSeeder::class);

        $data = [
            'toll' => TollStation::find(1),
            'vehicles' => TollStationVehicle::getVehiclesGroupedById(1)->get()
        ];

        $response = $this->get(route('showToll', 1));

        $response
            ->assertStatus(200)
            ->assertViewIs('showToll')
            ->assertViewHasAll($data);
    }

    public function test_CheckIfRedirectWhenTollViewIsLoaded()
    {
        $this->seed(TestSeeder::class);

        $response = $this->get(route('showToll', -1));

        $response
            ->assertRedirect(route('home'));
    }
}
