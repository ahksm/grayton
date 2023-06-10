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

        $foundLocation = Location::whereRaw('LOCATE(?, country) > 0', [$location])->first();

        $tariffs = $foundLocation->tariffs;

        $currentLocale = app()->getLocale();

        $tariffs->transform(function ($tariff) use ($currentLocale) {
            $translation = $tariff->translations->where('locale', $currentLocale)->first();

            if ($translation) {
                $tariff->original_name = $tariff->name;
                $tariff->name = $translation->namename_translation;
                $tariff->descr = $translation->descr_translation;
            }

            return $tariff;
        });

        return view('tariff.index', compact('locations', 'tariffs'));
    }
}
