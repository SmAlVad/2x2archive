@extends('layouts.app')

@section('content')
    @include('partials.flash')

    <div class="slider">

        <div class="slider-item slider-item-1">
            <div class="slider-info">
                <div class="s-title">
                    <h1><span class="s-accent">1 500 000</span> объявлений в Архиве</h1>
                </div>
                <div class="s-desc">
                    <p>База объявлений постоянно обновляется</p>
                </div>
                <div class="s-action">
                    <a href="{{ route('advert-index') }}" class="app-btn">объявления</a>
                </div>
            </div>
        </div>

        <div class="slider-item slider-item-2">
            <div class="slider-info">
                <div class="s-title">
                    <h1><span class="s-accent">700</span> выпусков</h1>
                </div>
                <div class="s-desc">
                    <p>самых читаемых газет Приамурья</p>
                </div>
                <div class="s-action">
                    <a href="{{ route('paper-index') }}" class="app-btn">газеты</a>
                </div>
            </div>
        </div>

        <div class="slider-item slider-item-3">
            <div class="slider-info">
                <div class="s-title">
                    <h1>Удобно. <span class="s-accent">Функционально.</span> Практично.</h1>
                </div>
                <div class="s-desc">
                    <p>Полная база данных на любом устройстве </p>
                </div>
{{--                <div class="s-action">
                    <a href="#" class="app-btn">действие 3</a>
                </div>--}}
            </div>
        </div>

    </div>


    {!! Form::open(['route' => 'payment-confirm', 'method' => 'GET']) !!}
    <div class="container-fluid mb-5">

        <div class="row justify-content-center mb-5">
            <div class="col-xl-10 text-center">
                <h3>Получение доступа </h3>
                <p>
                    При регистрации на сайте предоставляется бесплатный доступ к Архиву объявлений и Архиву газет на 24 часа.
                </p>
                <p>
                    После необходимо выбрать один из тарифов и приобрести ключ доступа для дальнейшего пользования ресурсом.
                </p>
            </div>
        </div>

        <div class="row justify-content-center">
            <div class="col-xl-10 text-center">
                <div class="select-rate-title">
                    <h3>Выберите тариф</h3>
                    <p>
                        Отсчет времени пользования начнется с момента активации ключа в Личном кабинете.
                        Там же вы сможете увидеть оставшееся время.
                    </p>
                </div>
            </div>
            {{-- Список тарифов --}}
            <div class="col-xl-10 mb-5">
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
                    <h3>Выберите удобный способ оплаты</h3>
                </div>
            </div>
            {{-- Способы оплаты --}}
            <div class="col-xl-10 mb-5">
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
