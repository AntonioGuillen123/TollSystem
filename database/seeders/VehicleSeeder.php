<?php

namespace Database\Seeders;

use App\Models\Vehicle;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class VehicleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $vehicles = [
            ['tuition' => 'ABC-1234', 'axle' => null, 'vehicle_type_id' => 1],
            ['tuition' => 'DEF-5678', 'axle' => null, 'vehicle_type_id' => 2],
            ['tuition' => 'GHI-9012', 'axle' => 6, 'vehicle_type_id' => 3],
            ['tuition' => 'JKL-3456', 'axle' => null, 'vehicle_type_id' => 1],
            ['tuition' => 'MNO-7890', 'axle' => null, 'vehicle_type_id' => 2],
            ['tuition' => 'PQR-1234', 'axle' => 8, 'vehicle_type_id' => 3],
            ['tuition' => 'STU-5678', 'axle' => null, 'vehicle_type_id' => 1],
            ['tuition' => 'VWX-9012', 'axle' => null, 'vehicle_type_id' => 2],
            ['tuition' => 'YZA-3456', 'axle' => 10, 'vehicle_type_id' => 3],
            ['tuition' => 'BCD-7890', 'axle' => null, 'vehicle_type_id' => 1]
        ];

        foreach ($vehicles as $vehicle) {
            Vehicle::create($vehicle);
        }
    }
}
