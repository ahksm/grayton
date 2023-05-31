<?php

use App\Http\Controllers\LocationController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\TariffController;
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
    $featured_tariffs = Tariff::where('featured', 1)->take(4)->get();
    return view('index', compact('locations', 'featured_tariffs'));
})->name('home');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__ . '/auth.php';

Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});

Route::post('/explore', function (Request $request) {
    $location = $request->input('location');
    return Redirect::route('location', ['location' => strtolower($location)]);
})->name('explore');

Route::get('/location/{location}', [LocationController::class, 'index'])->name('location');

Route::get('/tariffs', [TariffController::class, 'index'])->name('tariffs');
Route::get('/tariffs/{city}', [TariffController::class, 'show'])->name('tarrif');

Route::post('/order', [OrderController::class, 'store'])->middleware('auth');
Route::patch('/order', [OrderController::class, 'update'])->middleware('auth');
