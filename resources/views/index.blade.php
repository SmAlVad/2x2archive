@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col">
                <div class="home">
                    <h1>Главная страница проекта</h1>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-12">
                <h2>Список тарифов</h2>
            </div>
            <div class="col-12">
                @forelse($rates as $rate)
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="rate" value="{{ $rate->id }}"
                        @if($rate->name === 'Базовый')
                            checked
                        @endif
                        >
                        <label class="form-check-label" for="exampleRadios1">
                            {{ $rate->name }} ({{ $rate->time }} часа - {{ $rate->price }} ₽)
                        </label>
                    </div>
                @empty
                   <h4>Данные отсутствуют</h4>
                @endforelse
            </div>
        </div>

        <div class="row">
            <div class="col-12">
                <h2>Способы оплаты</h2>
            </div>
            <div class="col-12">
                @forelse($paymentMethods as $method)
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="paymentMethods" value="{{ $method->id }}"
                               @if($method->name === 'Картой')
                               checked
                                @endif
                        >
                        <label class="form-check-label" for="exampleRadios1">
                            {{ $method->name }}
                            <img height="40px" src="{{asset('/storage/' . $method->image)}}">
                        </label>
                    </div>
                @empty
                    <h4>Данные отсутствуют</h4>
                @endforelse
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <button class="btn btn-lg btn-primary btn-block">Получить код</button>
            </div>
        </div>
    </div>
@endsection
