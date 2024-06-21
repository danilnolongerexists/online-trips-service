<?php

namespace App\Http\Controllers;

use App\Models\Vehicle;
use Orchid\Attachment\Models\Attachment;

class ViewsController extends Controller
{
    public function index()
    {
        $vehicles = null;
        if (!is_null(request('category'))) {
            $vehicles = Vehicle::where('category', request('category'))->get()->map(function ($vehicle) {
                $image = Attachment::find($vehicle->image);
                $vehicle->image = $image ? $image->url() : null;
                return $vehicle;
            });
        } else {
            $vehicles = Vehicle::all()->map(function ($vehicle) {
                $image = Attachment::find($vehicle->image);
                $vehicle->image = $image ? $image->url() : null;
                return $vehicle;
            });
        }


        return view("index", [
            'vehicles' => $vehicles,
        ]);
    }

    public function register()
    {
        return view("pages.register");
    }

    public function login()
    {
        return view("pages.login");
    }

    // public function profile()
    // {
    //     return view("pages.profile");
    // }

    public function orders()
    {
        return view("pages.orders");
    }

    public function vehicle(Vehicle $vehicle)
    {
        return view("pages.vehicle", [
            'vehicle' => $vehicle,
        ]);
    }
}
