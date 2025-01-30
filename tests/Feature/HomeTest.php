<?php

namespace Tests\Feature;

use App\Models\TollStation;
use App\Models\Vehicle;
use Database\Seeders\TestSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class HomeTest extends TestCase
{
    use RefreshDatabase;

    public function test_CheckIfHomeViewIsLoadedWithData()
    {
        $this->seed(TestSeeder::class);

        $data = [
            'tolls' => TollStation::all(),
            'vehicles' => Vehicle::all()
        ];

        $response = $this->get(route('home'));

        $response
            ->assertStatus(200)
            ->assertViewIs('home')
            ->assertViewHasAll($data);
    }
}
