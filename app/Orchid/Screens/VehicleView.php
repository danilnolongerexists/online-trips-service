<?php

namespace App\Orchid\Screens;

use App\Models\Vehicle;
use Orchid\Screen\Screen;
use Orchid\Screen\Fields\Input;
use Orchid\Screen\TD;
use Orchid\Support\Facades\Layout;
use Orchid\Screen\Actions\Link;

class VehicleView extends Screen
{
    /**
     * Fetch data to be displayed on the screen.
     *
     * @return array
     */
    public function query(): iterable
    {
        return [
            'vehicles' => Vehicle::all(),
        ];
    }

    /**
     * The name of the screen displayed in the header.
     *
     * @return string|null
     */
    public function name(): ?string
    {
        return 'VehicleView';
    }

    /**
     * The screen's action buttons.
     *
     * @return \Orchid\Screen\Action[]
     */
    public function commandBar(): array
    {
        return [
            Link::make('Create')
            ->icon('pencil')
            ->route('platform.vehicle.edit')
        ];
    }

    /**
     * The screen's layout elements.
     *
     * @return \Orchid\Screen\Layout[]|string[]
     */
    public function layout(): iterable
    {
        return [
            Layout::table('vehicles', [
                TD::make('model', __('Model'))
                  ->sort()
                  ->filter(Input::make())
                  ->render(function (Vehicle $vehicle){
                    return Link::make($vehicle->model)
                        ->route('platform.vehicle.edit', $vehicle);
                  }),
                TD::make('brand', __('Brand'))
                  ->sort()
                  ->filter(Input::make())
                  ->render(function (Vehicle $vehicle){
                    return $vehicle->brand;
                  }),
                TD::make('year', __('Year'))
                  ->sort()
                  ->filter(Input::make())
                  ->render(function (Vehicle $vehicle){
                    return $vehicle->year;
                  }),
                TD::make('category', __('Category'))
                  ->sort()
                  ->filter(Input::make())
                  ->render(function (Vehicle $vehicle){
                    return $vehicle->category;
                  }),
                TD::make('price', __('Price'))
                  ->sort()
                  ->filter(Input::make())
                  ->render(function (Vehicle $vehicle){
                    return $vehicle->price;
                  }),
                TD::make('status', __('Status'))
                  ->sort()
                  ->filter(Input::make())
                  ->render(function (Vehicle $vehicle){
                    return $vehicle->status;
                  }),
                TD::make('driver_id', __('Driver'))
                  ->sort()
                  ->filter(Input::make())
                  ->render(function (Vehicle $vehicle){
                    return $vehicle->driver->name;
                  }),
            ])
        ];
    }
}
