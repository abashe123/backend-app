<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;

class OrderController extends Controller
{
    public function store(Request $request)
    {
        $order = new Order;
        $order->hospital_name = $request->hospital_name;
        $order->patient_details = $request->patient_details;
        $order->sender_name = $request->sender_name;
        $order->sample_transportation_date = $request->sample_transportation_date;
        $order->save();

        return response()->json(['message' => 'Order submitted successfully'], 201);
    }
}
