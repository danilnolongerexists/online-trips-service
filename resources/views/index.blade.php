@include('includes.header')

<div class="container mt-4">
    <div class="row">
        <div class="col-md-12">
            <h1 class="my-4">Главная</h1>
        </div>

        <div class="col-md-12 mb-4">
            <form method="GET" action="{{ route('index') }}">
                <div class="form-group">
                    <label for="category">Выберите кузов:</label>
                    <select class="form-control" id="category" name="category">
                        <option value="">Все</option>
                        @foreach($vehicles as $vehicle)
                            <option value="{{ $vehicle->category }}" {{ request('category') == $vehicle->category ? 'selected' : '' }}>
                                {{ $vehicle->category }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <button type="submit" class="btn btn-primary">Фильтр</button>
                <div class="form-group">
                    <br>
                    <label for="sort">Сортировка по цене:</label>
                    <select class="form-control" id="sort" name="sort">
                        <option value="">Без сортировки</option>
                        <option value="asc" {{ request('sort') == 'asc' ? 'selected' : '' }}>По возрастанию</option>
                        <option value="desc" {{ request('sort') == 'desc' ? 'selected' : '' }}>По убыванию</option>
                    </select>
                </div>
                <button type="submit" class="btn btn-primary">Сортировка</button><br>
            </form>
            <h2 class="my-4">Выберите машину</h2>
        </div>

        @foreach ($vehicles as $vehicle)
            <div class="col-md-4 mb-4">
                <div class="card h-100">
                    <div class="card-body">
                        <h2 class="card-title">{{ $vehicle->model }} {{ $vehicle->brand }}</h2>
                        <p class="card-title">Год выпуска: {{ $vehicle->year }}</p>
                        <p class="card-title">{{ $vehicle->category }}</p>
                        <p class="card-title">Водитель: {{ $vehicle->driver->name }}</p>
                        <p class="card-text">Стаж (в годах): {{ $vehicle->driver->experience }}</p>
                        <p class="card-title">Цена: {{ $vehicle->price }} руб.</p>
                        <a href="{{ route('vehicle.show', $vehicle) }}" class="btn btn-primary">Заказать</a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
