<?php

namespace App\Http\Controllers;

use App\Models\Vehicle;
use Orchid\Attachment\Models\Attachment;

class ViewsController extends Controller
{
    public function index()
    {
        $query = Vehicle::query();

        if (!is_null(request('category'))) {
            $query->where('category', request('category'));
        }

        if (!is_null(request('sort'))) {
            $sortOrder = request('sort') === 'asc' ? 'asc' : 'desc';
            $query->orderBy('price', $sortOrder);
        }

        $vehicles = $query->get()->map(function ($vehicle) {
            $image = Attachment::find($vehicle->image);
            $vehicle->image = $image ? $image->url() : null;
            return $vehicle;
        });

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
