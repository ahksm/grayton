<?php

namespace App\Http\Controllers;

use App\Models\Location;
use App\Models\Tariff;
use Illuminate\Http\Request;

class LocationController extends Controller
{
    public function index($location)
    {
        $locations = Location::all();

        $location = Location::where('country', $location)->firstOrFail();

        $tariffs = $location->tariffs;

        return view('tariff.index', compact('locations', 'tariffs'));
    }
}
