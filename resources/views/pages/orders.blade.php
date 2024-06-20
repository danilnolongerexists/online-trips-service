@include('includes.header')

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h1 class="my-4">Профиль</h1>
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-9">
                            <h2>{{ Auth::user()->name }}</h2>
                            <p><b>Email:</b><br>{{ Auth::user()->email }}</p>
                            <p><b>Дата регистрации:</b><br>{{ Auth::user()->registration_date }}</p>
                        </div>
                    </div>
                </div>
            </div>
            <h2 class="my-4">История заказов</h2>
            @foreach(Auth::user()->trips as $trip)
            <div class="card my-2">
                <div class="card-body">
                    <h5 class="card-title">Заказ #{{ $trip->id }}</h5>
                    <p class="card-text">Машина: {{ $trip->vehicle->brand }} {{ $trip->vehicle->model }}</p>
                    <p class="card-text">Водитель: {{ $trip->vehicle->driver->name }}</p>
                    <p class="card-text">Стаж (в годах): {{ $trip->vehicle->driver->experience }}</p>
                    <p class="card-text">Откуда? {{ $trip->start_location }}</p>
                    <p class="card-text">Куда? {{ $trip->end_location }}</p>
                    <p class="card-text">Дата заказа: {{ $trip->order_date }}</p>
                    <p class="card-text">Тип оплаты: {{ $trip->payment }}</p>
                    @if(empty($trip->review))
                            <form action="{{ route('trips.review', $trip->id) }}" method="POST">
                                @csrf
                                <div class="form-group">
                                    <label for="comment">Оставьте отзыв:</label>
                                    <textarea class="form-control" id="comment" name="comment"></textarea>
                                </div>
                                <div class="form-group">
                                    <label>Оценка:</label>
                                    <div>
                                        @for($i = 1; $i <= 5; $i++)
                                            <input type="radio" id="star{{ $i }}" name="rating" value="{{ $i }}" {{ old('rating') == $i ? 'checked' : '' }}>
                                            <label for="star{{ $i }}">{{ $i }}</label>
                                        @endfor
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-primary">Отправить отзыв</button>
                            </form>
                        @else
                            <p>Ваш отзыв: {{ $trip->review->comment }}</p>
                            <p>Ваша оценка: {{ $trip->review->rating }} из 5</p>
                            <p>{{ $trip->review->review_date }}</p>
                        @endif
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
