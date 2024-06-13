@include('includes.header')

<div class="container mt-4">
    <div class="row">
        <div class="col-md-12">
            <h1 class="my-4">Главная</h1>
            <p class="lead">Выберите машину</p>
        </div>
        @foreach ($vehicles as $vehicle)
            <div class="col-md-4 mb-4">
                <div class="card h-100">
                    <div class="card-body">
                        <h2 class="card-title">{{ $vehicle->model }}</h2>
                        <p class="card-title">{{ $vehicle->brand }}</p>
                        <p class="card-title">Год выпуска: {{ $vehicle->year }}</p>
                        <p class="card-title">Кузов: {{ $vehicle->category }}</p>
                        <p class="card-title">Водитель: {{ $vehicle->driver->name }}</p>
                        <p class="card-title">Стаж: {{ $vehicle->driver->experience }} лет</p>
                        <p class="card-title">Цена: {{ $vehicle->price }} руб.</p>
                        <a href="{{ route('vehicle.show', $vehicle) }}" class="btn btn-primary">Заказать</a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
