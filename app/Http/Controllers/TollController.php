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
        $toll = $this->getTollById($id);

        if (!$toll) {
            return $this->responseWithRedirect();
        }

        $vehicles = $this->getVehiclesGroupedById($id);

        return $this->responseWithSuccess($toll, $vehicles);
    }

    private function getTollById($id)
    {
        return TollStation::find($id);
    }

    private function getVehiclesGroupedById($id)
    {
        return TollStationVehicle::getVehiclesGroupedById($id)->get();
    }

    private function responseWithSuccess($toll, $vehicles)
    {
        return view('showToll', compact('toll', 'vehicles'));
    }

    private function responseWithRedirect()
    {
        return redirect()->route('home');
    }
}
