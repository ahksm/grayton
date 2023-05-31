<?php

namespace App\Http\Controllers;

use App\Models\Location;
use App\Models\Tariff;
use Illuminate\Http\Request;

class TariffController extends Controller
{
    public function index()
    {
        $locations = Location::all();

        $tariffs = Tariff::all();

        return view('tariff.index', compact('locations', 'tariffs'));
    }

    public function show($city)
    {
        $tariff = Tariff::where('name', $city)->firstOrFail();

        return view('tariff.show', compact('tariff'));
    }
}
