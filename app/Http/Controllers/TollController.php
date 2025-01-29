<?php

namespace App\Http\Controllers;

use App\Models\TollStation;
use App\Models\TollStationVehicle;
use Illuminate\Http\Request;

class TollController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke($id)
    {
        $toll = $this->getTollFromId($id);

        if (!$toll) {
            return $this->responseWithRedirect();
        }

        $vehicles = $this->getVehiclesGroupedById($id);
        /* return response()->json([
            't' => $toll,
            'v' => $vehicles
        ]); */

        return view('showToll', compact('toll', 'vehicles'));
    }

    private function getTollFromId($id)
    {
        return TollStation::find($id);
    }

    private function getVehiclesGroupedById($id)
    {
        return TollStationVehicle::with(['vehicle', 'vehicle.vehicleType'])
            ->where('toll_station_id', $id)->groupBy('toll_station_id', 'vehicle_id', 'toll_value')
            ->selectRaw('vehicle_id, toll_value, COUNT(*) as totalCount')
            ->get();
    }

    private function responseWithRedirect()
    {
        return redirect()->route('home');
    }
}
