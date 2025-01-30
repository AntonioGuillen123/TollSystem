<?php

namespace Tests\Feature\Api;

use Database\Seeders\TestSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class TollTest extends TestCase
{
    use RefreshDatabase;

    public function test_CheckIfCreateNewTicketFromIds()
    {
        $this->seed(TestSeeder::class);

        $response = $this->postJson(route('createTollTicket', 1), [
            'vehicle_id' => 1
        ]);

        $responseData = [
            'message' => 'The vehicle has been registered for the toll successfully :)'
        ];

        $databaseData = [
            'toll_station_id' => 1,
            'vehicle_id' => 1,
            'toll_value' => 100
        ];

        $response
            ->assertStatus(200)
            ->assertJsonFragment($responseData);

        $table = 'toll_station_vehicle';

        $this->assertDatabaseCount($table, 1);
        $this->assertDatabaseHas($table, $databaseData);
    }
}
