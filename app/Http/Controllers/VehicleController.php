<?php

namespace App\Http\Controllers;

use App\Models\TollStationVehicle;
use App\Models\Vehicle;
use Illuminate\Http\Request;

class VehicleController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request, $id)
    {
        $vehicle = $this->getVehicleWithTotalById($id);

        if (!$vehicle) {
            return $this->responseWithRedirect();
        }

        $tolls = $this->getTollsFromVehicleById($id);

        return $this->responseWithSuccess($vehicle, $tolls);
    }

    private function getVehicleWithTotalById($id)
    {
        return Vehicle::with('vehicleType')
            ->withSum('tollStations as totalSum', 'toll_station_vehicle.toll_value')
            ->find($id);
    }

    private function getTollsFromVehicleById($id)
    {
        return TollStationVehicle::getTollsGroupedById($id)->get();
    }

    private function responseWithSuccess($vehicle, $tolls)
    {
        return view('showVehicle', compact('vehicle', 'tolls'));
    }

    private function responseWithRedirect()
    {
        return redirect()->route('home');
    }
}
