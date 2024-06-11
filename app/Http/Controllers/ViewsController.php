<?php

namespace App\Http\Controllers;

use App\Models\Basket;
use App\Models\Vehicle;
use Orchid\Attachment\Models\Attachment;

class ViewsController extends Controller
{
    public function index()
    {
        $vehicles = Vehicle::all()->map(function ($vehicle) {
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

    // public function profile()
    // {
    //     return view("pages.profile");
    // }

    // public function basket()
    // {
    //     return view("pages.basket", [
    //         'products' => Basket::all(),
    //     ]);
    // }

    // public function category(Category $category)
    // {
    //     return view("pages.category", [
    //         'category' => $category,
    //     ]);
    // }
}
