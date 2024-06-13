<?php

namespace App\Http\Controllers;

use App\Models\Trip;
use Illuminate\Http\Request;
use App\Models\Vehicle;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    public function checkout(Request $request, Vehicle $vehicle)
    {

        // dd($request->payment);

        $trip = new Trip;
        $trip->user_id = $request->user()->id;
        $trip->start_location = $request->start_location;
        $trip->end_location = $request->end_location;
        $trip->payment = $request->payment;
        $trip->vehicle_id = $vehicle->id;
        $trip->save();

        return redirect()->route('index')->with('success', 'Заказ оформлен');
    }

}
