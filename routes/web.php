<?php

use App\Http\Controllers\LocationController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\TariffController;
use App\Http\Controllers\TranslationController;
use App\Models\Location;
use App\Models\Tariff;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Redirect;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    $locations = Location::all();
    $currentLocale = app()->getLocale();
    $locationTranslations = $locations->map(function ($location) use ($currentLocale) {
        return collect($location->translations)->firstWhere('locale', $currentLocale) ?? collect($location->translations)->last();
    })->filter();

    // dd($locationTranslations->toArray());

    $featured_tariffs = Tariff::where('featured', 1)->take(4)->get();
    $tariffTranslations = $featured_tariffs->map(function ($tariff) use ($currentLocale) {
        $translation = collect($tariff->translations)->firstWhere('locale', $currentLocale);
        return $translation ?? collect($tariff->translations)->last();
    })->filter();
    return view('index', compact('locations', 'featured_tariffs', 'locationTranslations', 'tariffTranslations'));
})->name('home');

require __DIR__ . '/auth.php';

Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});

Route::post('/explore', function (Request $request) {
    $location = $request->input('location');
    return empty($location) ? Redirect::route('home') : Redirect::route('location', ['location' => strtolower($location)]);
})->name('explore');

Route::get('/location/{location}', [LocationController::class, 'index'])->name('location');

Route::get('/tariffs', [TariffController::class, 'index'])->name('tariffs');
Route::get('/tariffs/{city}', [TariffController::class, 'show'])->name('tarrif');

Route::post('/order', [OrderController::class, 'store'])->middleware('auth');
Route::patch('/order', [OrderController::class, 'update'])->middleware('auth');

Route::post('/language/change', [TranslationController::class, 'changeLanguage'])->name('language.change');
