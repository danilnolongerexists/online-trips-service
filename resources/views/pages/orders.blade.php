@include('includes.header')

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h1 class="my-4">История заказов</h2>
            @foreach(Auth::user()->trips as $trip)
            <div class="card my-2">
                <div class="card-body">
                    <h5 class="card-title">Заказ #{{ $trip->id }}</h5>
                    <p class="card-text">Машина {{ $trip->vehicle_id }}</p>
                    <p class="card-text">Откуда? {{ $trip->start_location }}</p>
                    <p class="card-text">Куда? {{ $trip->end_location }}</p>
                    <p class="card-text">Дата заказа: {{ $trip->order_date }}</p>
                    <p class="card-text">Куда? {{ $trip->end_location }}</p>
                    <p class="card-text">Тип оплаты: {{ $trip->payment }}</p>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
