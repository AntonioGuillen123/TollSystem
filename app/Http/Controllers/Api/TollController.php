<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\TollStation;
use App\Models\TollStationVehicle;
use App\Models\Vehicle;
use Illuminate\Http\Request;

class TollController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request, int $tollId)
    {
        $toll = TollStation::find($tollId);

        if (!$toll) {
            return response()->json([
                'message' => 'The toll id does not exists'
            ], 404);
        }
        
        $validated = $request->validate([
            'vehicle_id' => 'required|integer|gt:0'
        ]);

        $vehicle = Vehicle::find($validated['vehicle_id']);

        if (!$vehicle) {
            return response()->json([
                'message' => 'The vehicle id does not exists'
            ], 404);
        }

        $toll->vehicles()->attach($vehicle);

        return response()->json([
            'message' => 'Todo ok'
        ], 201);
    }
}
