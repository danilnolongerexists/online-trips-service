<?php

namespace App\Orchid\Screens;

use App\Models\Driver;
use Orchid\Screen\Screen;
use Orchid\Screen\Fields\Input;
use Orchid\Screen\TD;
use Orchid\Support\Facades\Layout;
use Orchid\Screen\Actions\Link;

class DriverView extends Screen
{
    /**
     * Fetch data to be displayed on the screen.
     *
     * @return array
     */
    public function query(): iterable
    {
        return [
            'drivers' => Driver::all(),
        ];
    }

    /**
     * The name of the screen displayed in the header.
     *
     * @return string|null
     */
    public function name(): ?string
    {
        return 'DriverView';
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
            ->route('platform.driver.edit')
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
            Layout::table('drivers', [
                TD::make('name', __('Name'))
                  ->sort()
                  ->filter(Input::make())
                  ->render(function (Driver $driver){
                    return Link::make($driver->name)
                        ->route('platform.driver.edit', $driver);
                  }),
                TD::make('experience', __('Experience'))
                  ->sort()
                  ->filter(Input::make())
                  ->render(function (Driver $driver){
                    return Link::make($driver->experience)
                        ->route('platform.driver.edit', $driver);
                  }),
                TD::make('phone', __('phone'))
                  ->sort()
                  ->filter(Input::make())
                  ->render(function (Driver $driver){
                    return Link::make($driver->phone)
                        ->route('platform.driver.edit', $driver);
                  }),
                TD::make('license_number', __('License_number'))
                  ->sort()
                  ->filter(Input::make())
                  ->render(function (Driver $driver){
                    return Link::make($driver->license_number)
                        ->route('platform.driver.edit', $driver);
                  }),
            ])
        ];
    }
}
