@include('includes.header')

<div class="container mt-4">
    <div class="row">
        <div class="col-md-12">
            <p class="card-title"><b>{{ $vehicle->model }} {{ $vehicle->brand }}</b></p>
            <p class="card-title">Год выпуска: {{ $vehicle->year }}</p>
            <p class="card-title">Кузов: {{ $vehicle->category }}</p>
            <p class="card-title">Водитель: {{ $vehicle->driver->name }}</p>
            <p class="card-title">Номер телефона: {{ $vehicle->driver->phone }}</p>
            <p class="card-text">Стаж (в годах): {{ $vehicle->driver->experience }}</p>
            <p class="card-title">Цена: {{ $vehicle->price }} руб.</p>

            <form action="{{ route('order.checkout', $vehicle) }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="address"><b>Откуда?</b></label>
                    <input type="text" class="form-control" id="start_location" name="start_location" value="" required>
                </div>
                <div class="form-group">
                    <label for="address"><b>Куда?</b></label>
                    <input type="text" class="form-control" id="end_location" name="end_location" value="" required>
                </div>

                <fieldset>
                    <legend>Выберите способ оплаты:</legend>

                    <div>
                      <input type="radio" id="cash" name="payment" value="Наличные" />
                      <label for="cash">Наличные</label>
                    </div>

                    <div>
                      <input type="radio" id="card" name="payment" value="По карте" />
                      <label for="card">По карте</label>
                    </div>

                </fieldset>

                <button type="submit" class="btn btn-primary">Заказать</button>

            </form>

        </div>

    </div>
</div>
