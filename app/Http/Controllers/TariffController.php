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

        $currentLocale = app()->getLocale();

        $tariffs->transform(function ($tariff) use ($currentLocale) {
            $translation = $tariff->translations->where('locale', $currentLocale)->first();

            if ($translation) {
                $tariff->original_name = $tariff->name;
                $tariff->name = $translation->name_translation;
                $tariff->descr = $translation->descr_translation;
            }

            return $tariff;
        });

        return view('tariff.index', compact('locations', 'tariffs'));
    }

    public function show($city)
    {
        $tariff = Tariff::where('name', $city)->firstOrFail();

        $currentLocale = app()->getLocale();

        $translation = $tariff->translations->where('locale', $currentLocale)->first();
        foreach ($tariff->location->translations as $location) {
            if ($location['locale'] == $currentLocale) {
                $slug = $location['country_translation'];
            } else {
                $slug = $tariff->location->country;
                foreach (json_decode($slug) as $key => $value) {
                    $slug = $value;
                }
            }
        }

        if ($translation) {
            $tariff->name = $translation->name_translation;
            $tariff->descr = $translation->descr_translation;
        }
        $tariff->location->country = $slug;

        return view('tariff.show', compact('tariff'));
    }
}
