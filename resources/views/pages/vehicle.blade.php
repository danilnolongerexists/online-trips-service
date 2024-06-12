@include('includes.header')

<div class="container mt-4">
    <div class="row">
        <div class="col-md-12">
            <p class="card-title">{{ $vehicle->model }}</p>
            <p class="card-title">{{ $vehicle->brand }}</p>
            <p class="card-title">Год выпуска: {{ $vehicle->year }}</p>
            <p class="card-title">Кузов: {{ $vehicle->category }}</p>
            <p class="card-title">Водитель: {{ $vehicle->driver->name }}</p>
            <p class="card-title">Цена: {{ $vehicle->price }} руб.</p>

            <form method="POST">
                @csrf
                <div class="form-group">
                    <label for="address">Откуда?</label>
                    <input type="text" class="form-control" id="address" name="address" value="{{ Auth::user()->address }}" required>
                </div>
                <div class="form-group">
                    <label for="address">Куда?</label>
                    <input type="text" class="form-control" id="address" name="address" value="{{ Auth::user()->address }}" required>
                </div>

                <fieldset>
                    <legend>Выберите способ оплаты:</legend>

                    <div>
                      <input type="radio" id="cash" name="payment" value="huey" />
                      <label for="cash">Наличные</label>
                    </div>

                    <div>
                      <input type="radio" id="card" name="payment" value="dewey" />
                      <label for="card">По карте</label>
                    </div>

                </fieldset>

                <button type="submit" class="btn btn-primary">Заказать</button>

            </form>

        </div>

    </div>
</div>
