<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Tariff;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'user_id' => ['required'],
            'tariff_id' => ['required'],
        ]);

        $order = Order::create($validatedData);
        $tariff_price = Tariff::find($validatedData['tariff_id'])->price;

        return response()->json([
            'order_id' => $order->id,
            'tariff_price' => $tariff_price,
        ]);
    }

    public function update(Request $request)
    {
        $order_id = $request->input('order_id');
        $status = $request->input('status');

        $order = Order::find($order_id);
        $order->status = $status;
        $order->save();

        return response()->json(['success' => true]);
    }
}
