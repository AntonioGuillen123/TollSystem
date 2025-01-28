<?php

namespace App\Http\Controllers;

use App\Models\TollStation;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        $tolls = $this->getTollsFromDB();

        return view('home', compact('tolls'));
    }

    private function getTollsFromDB(){
        return TollStation::all();
    }
}
