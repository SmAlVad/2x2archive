@extends('layouts.app')

@section('content')
    {{-- Хлебные крошки --}}
    <ul class="app-breadcrumb">
        <li class="app-breadcrumb-item">
            <a href="{{ route('index') }}">Главная</a>
        </li>
        <li class="app-breadcrumb-active">
            Купить ключ
        </li>
    </ul>

    {!! Form::open(['route' => 'payment-confirm', 'method' => 'GET']) !!}
    <div class="container-fluid mb-5">
        <div class="row justify-content-center">
{{--            <div class="col-xl-10 text-center">
                <h3>Подписка</h3>
                <p>
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ad blanditiis debitis dolor nemo rem repudiandae
                    voluptatibus. Doloribus laboriosam quasi sed.Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ad
                    blanditiis debitis dolor nemo rem repudiandae voluptatibus. Doloribus laboriosam quasi sed.
                </p>
            </div>--}}

            <div class="col-xl-10 text-center">
                <div class="select-rate-title">
                    <h3>Выберите тариф</h3>
                </div>
            </div>
            {{-- Список тарифов --}}
            <div class="col-xl-10 mb-2">
                <div class="select-rate">
                    @foreach($rates as $rate)
                        <div class="select-rate-radio-container">
                            <div class="radio-btn">
                                <input type="radio" name="rate" id="rate-{{ $rate->id }}" value="{{ $rate->id }}"
                                        {{ ($rate->name == 'Стандарт') ? 'checked' : '' }}>
                                <label for="rate-{{ $rate->id }}">
                                    <h3>{{ $rate->name  }}</h3>
                                    Часов: {{ $rate->time }} <br/>
                                    Цена: {{ $rate->price }}₽
                                </label>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>

            <div class="col-xl-10 text-center">
                <div class="payment-method-title">
                    <h3>Выберите способ оплаты</h3>
                </div>
            </div>
            {{-- Способы оплаты --}}
            <div class="col-xl-10 mb-4">
                <div class="payment-method">
                    @foreach($paymentMethods as $pM)
                        <div class="payment-method-container">
                            <div class="radio-btn">
                                <input type="radio" name="payment-alias" id="payment-method-{{ $pM->id }}" value="{{ $pM->rk_alias }}"
                                        {{ ($pM->rk_alias === 'BankCard') ? 'checked' : '' }}
                                >
                                <label for="payment-method-{{ $pM->id }}">
                                    <span>{{ $pM->name }}</span><br/>
                                    <img src="{{asset('/storage/payment-methods/' . $pM->image)}}" alt="{{ $pM->name }}" width="100">
                                </label>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>

            <div class="col-xl-10">
                <button class="app-btn payment-btn w-50" type="submit">ДАЛЕЕ</button>
            </div>
        </div>
    </div>
    {!! Form::close() !!}
@endsection
