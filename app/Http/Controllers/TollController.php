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
        /* $groupedVehicles = $this->getVehiclesGroupBy($tolls, 'id'); */

        return response()->json([
            'toll' => $toll,
            'vehicles' => $vehicles
            /* 'KE' => $KHEEEE */
        ], 200);

        //return view('showToll');
    }

    private function getTollFromId($id)
    {
        return TollStation::find($id);
    }

    private function getVehiclesGroupedById($id)
    {
        return TollStationVehicle::with('vehicle')
            ->where('toll_station_id', $id)->groupBy('toll_station_id', 'vehicle_id', 'toll_value')
            ->selectRaw('vehicle_id, toll_value, COUNT(*) as totalCount')
            ->get();
    }

    private function responseWithRedirect()
    {
        return redirect()->route('home');
    }


    /* private function getVehiclesGroupBy($tolls, $groupField)
    {
        $groupedVehiclesWithLength = [];

        foreach ($tolls as $toll) {
            $groupedVehicles = $toll->vehicles->groupBy($groupField);

            $groupedVehiclesWithLength[] = [
                'vehicles' => $groupedVehicles,
                'count' => $groupedVehicles
            ]
        }

        return $groupedVehicles;
    }

    private function makeFinalTolls(){

    } */
}
