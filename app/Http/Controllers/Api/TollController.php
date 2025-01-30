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
    public function __invoke(Request $request, $tollId)
    {
        $toll = $this->getTollFromId($tollId);

        if (!$toll) 
            return $this->responseWithError('The toll id does not exists', 404);

        $vehicle = $this->getVehicleFromRequest($request);

        if (!$vehicle) 
            return $this->responseWithError('The vehicle id does not exists', 404);

        $this->createTicket($toll, $vehicle);

        return $this->responseWithSucess();
    }

    private function validateData($request)
    {
        $validated = $request->validate([
            'vehicle_id' => 'required|integer|gt:0'
        ]);

        return $validated;
    }

    private function getVehicleFromRequest($request)
    {
        $validated = $this->validateData($request);

        return $this->getVehicleFromId($validated['vehicle_id']);
    }

    private function getTollFromId($tollId)
    {
        return TollStation::find($tollId);
    }

    private function getVehicleFromId($tollId)
    {
        return TollStation::find($tollId);
    }

    private function createTicket($toll, $vehicle)
    {
        $toll->vehicles()->attach($vehicle);
    }

    private function responseWithSuccess(){
        return response()->json([
            'message' => 'The vehicle has been registered for the toll successfully :)'
        ], 200);
    }

    private function responseWithError($message, $statusError){
        return response()->json($message . ' :(', $statusError);
    }
}
