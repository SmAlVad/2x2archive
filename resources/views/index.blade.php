@extends('layouts.app')

@section('content')
    @include('partials.flash')

    <div class="slider">

        <div class="slider-item slider-item-1">
            <div class="slider-info">
                <div class="s-title">
                    <h1>Продающий слоган 1</h1>
                </div>
                <div class="s-desc">
                    <p>Продающиее описание</p>
                </div>
                <div class="s-action">
                    <a href="#" class="app-btn">действие 1</a>
                </div>
            </div>
        </div>

        <div class="slider-item slider-item-2">
            <div class="slider-info">
                <div class="s-title">
                    <h1>Продающий слоган 2</h1>
                </div>
                <div class="s-desc">
                    <p>Продающиее описание</p>
                </div>
                <div class="s-action">
                    <a href="#" class="app-btn">действие 2</a>
                </div>
            </div>
        </div>

        <div class="slider-item slider-item-3">
            <div class="slider-info">
                <div class="s-title">
                    <h1>Продающий слоган 3</h1>
                </div>
                <div class="s-desc">
                    <p>Продающиее описание</p>
                </div>
                <div class="s-action">
                    <a href="#" class="app-btn">действие 3</a>
                </div>
            </div>
        </div>

    </div>


    {!! Form::open(['route' => 'payment-confirm', 'method' => 'GET']) !!}
    <div class="container-fluid mb-5">
        <div class="row justify-content-center">
            <div class="col-xl-10 text-center">
                <h3>Подписка</h3>
                <p>
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ad blanditiis debitis dolor nemo rem repudiandae
                    voluptatibus. Doloribus laboriosam quasi sed.Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ad
                    blanditiis debitis dolor nemo rem repudiandae voluptatibus. Doloribus laboriosam quasi sed.
                </p>
            </div>

            <div class="col-xl-10 text-center">
                <div class="select-rate-title">
                    <h3>Выберите тариф</h3>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Necessitatibus, ullam.</p>
                </div>
            </div>
            {{-- Список тарифов --}}
            <div class="col-xl-10 mb-2">
                <div class="select-rate">
                    @foreach($rates as $rate)
                        <div class="select-rate-radio-container">
                            <div class="radio-btn">
                                <input type="radio" name="rate" id="rate-{{ $rate->id }}" value="{{ $rate->id }}"
                                    {{ ($rate->name == 'Расширенный') ? 'checked' : '' }}>
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
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Necessitatibus, ullam.</p>
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
