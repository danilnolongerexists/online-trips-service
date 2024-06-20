<?php

namespace App\Orchid\Screens;

use App\Models\Driver;
use Orchid\Screen\Screen;
use Orchid\Support\Facades\Layout;
use Orchid\Screen\Fields\Input;
use Orchid\Screen\Actions\Button;
use Orchid\Support\Facades\Alert;
use Illuminate\Http\Request;


class DriverEdit extends Screen
{
    public $driver;
    /**
     * Fetch data to be displayed on the screen.
     *
     * @return array
     */
    public function query(Driver $driver): iterable
    {
        return [
        'driver' => $driver];
    }

    /**
     * The name of the screen displayed in the header.
     *
     * @return string|null
     */
    public function name(): ?string
    {
        return $this->driver->exists ? 'Edit vehicle' : 'Creating a new vehicle';
    }

    /**
     * The screens action buttons.
     *
     * @return \Orchid\Screen\Action[]
     */
    public function commandBar(): array
    {
        return [
            Button::make('Create product')
                ->icon('pencil')
                ->method('createOrUpdate')
                ->canSee(!$this->driver->exists),

            Button::make('Update')
                ->icon('note')
                ->method('createOrUpdate')
                ->canSee($this->driver->exists),

            Button::make('Remove')
                ->icon('trash')
                ->method('remove')
                ->canSee($this->driver->exists),
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
            Layout::rows([
                Input::make('driver.name')
                    ->title('Name'),
                Input::make('driver.experience')
                    ->title('Experience'),
                Input::make('driver.phone')
                    ->title('Phone'),
                Input::make('driver.license_number')
                    ->title('License_number'),
            ])
        ];
    }

    public function createOrUpdate(Request $request)
    {
        $this->driver->fill($request->get('driver'))->save();

        Alert::info('You have successfully created a driver.');

        return redirect()->route('platform.drivers');
    }

    public function remove()
    {
        $this->driver->delete();

        Alert::info('You have successfully deleted the driver.');

        return redirect()->route('platform.drivers');
    }
}
