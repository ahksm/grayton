<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Tariff;
use Illuminate\Http\Request;

class BookingController extends Controller
{
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'user_id' => ['required'],
            'tariff_id' => ['required'],
        ]);

        $order = Booking::create($validatedData);
        $tariff_price = Tariff::find($validatedData['tariff_id'])->price;

        return response()->json([
            'order_id' => $order->id,
            'tariff_price' => $tariff_price,
        ]);
    }
}
