<?php

namespace App\Http\Controllers;

use App\Models\TollStation;
use App\Models\Vehicle;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        $tolls = $this->getTollsFromDB();
        $vehicles = $this->getVehiclesFromDB();

        return $this->responseWithSuccess($tolls, $vehicles);
    }

    private function getTollsFromDB(){
        return TollStation::all();
    }

    private function getVehiclesFromDB(){
        return Vehicle::all();
    }

    private function responseWithSuccess($tolls, $vehicles)
    {
        return view('home', compact('tolls', 'vehicles'));
    }
}
