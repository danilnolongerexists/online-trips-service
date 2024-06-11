<?php

namespace App\Orchid\Screens;

use App\Models\Vehicle;
use Orchid\Screen\Screen;
use Orchid\Support\Facades\Layout;
use Orchid\Screen\Fields\Input;
use Orchid\Screen\Fields\Relation;
use App\Models\Category;
use App\Models\Driver;
use Orchid\Screen\Actions\Button;
use Orchid\Support\Facades\Alert;
use Illuminate\Http\Request;


class VehicleEdit extends Screen
{
    public $vehicle;
    /**
     * Fetch data to be displayed on the screen.
     *
     * @return array
     */
    public function query(Vehicle $vehicle): iterable
    {
        return [
        'vehicle' => $vehicle];
    }

    /**
     * The name of the screen displayed in the header.
     *
     * @return string|null
     */
    public function name(): ?string
    {
        return $this->vehicle->exists ? 'Edit vehicle' : 'Creating a new vehicle';
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
                ->canSee(!$this->vehicle->exists),

            Button::make('Update')
                ->icon('note')
                ->method('createOrUpdate')
                ->canSee($this->vehicle->exists),

            Button::make('Remove')
                ->icon('trash')
                ->method('remove')
                ->canSee($this->vehicle->exists),
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
                Input::make('vehicle.model')
                    ->title('Model'),
                Input::make('vehicle.brand')
                    ->title('Brand'),
                Input::make('vehicle.year')
                    ->title('Year'),
                Input::make('vehicle.category')
                    ->title('Category'),
                Relation::make('vehicle.driver_id')
                    ->title('Driver ID')
                    ->fromModel(Driver::class, 'name', 'id'),
            ])
        ];
    }

    public function createOrUpdate(Request $request)
    {
        $this->vehicle->fill($request->get('vehicle'))->save();

        Alert::info('You have successfully created a vehicle.');

        return redirect()->route('platform.vehicles');
    }

    public function remove()
    {
        $this->vehicle->delete();

        Alert::info('You have successfully deleted the vehicle.');

        return redirect()->route('platform.vehicles');
    }
}
