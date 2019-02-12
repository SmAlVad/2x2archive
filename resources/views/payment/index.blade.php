@extends('layouts.app')

@section('content')
    {!! Form::open(['route' => 'payment-confirm', 'method' => 'GET']) !!}
    <div class="container-fluid">
        {{-- Описание --}}
        <div class="payment-description">
            <div class="select-rate-title">
                <h3>Подписка</h3>
            </div>
            <div class="payment-description-content">
                <p>
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ad blanditiis debitis dolor nemo rem repudiandae
                    voluptatibus. Doloribus laboriosam quasi sed.Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ad
                    blanditiis debitis dolor nemo rem repudiandae voluptatibus. Doloribus laboriosam quasi sed.
                </p>
                <p>
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ad blanditiis debitis dolor nemo rem repudiandae
                    voluptatibus. Doloribus laboriosam quasi sed.
                </p>
            </div>
        </div>

        <br>

        {{-- Список тарифов --}}
        <div class="select-rate">
            <div class="select-rate-title">
                <h3>Выбрать тариф</h3>
            </div>
            @foreach($rates as $rate)
                <div class="select-rate-radio-container">
                    <div class="radio-btn">
                        <input type="radio" name="rate" id="rate-{{ $rate->id }}" value="{{ $rate->id }}"
                                {{ ($rate->name == 'Расширенный') ? 'checked' : '' }}>
                        <label for="rate-{{ $rate->id }}">
                            {{ $rate->name  }} <br/>
                            Часов: {{ $rate->time }} <br/>
                            Цена: {{ $rate->price }}
                        </label>
                    </div>
                </div>
            @endforeach
        </div>

        <br/>

        {{-- Способы оплаты --}}
        <div class="payment-method">
            <div class="payment-method-title">
                <h3>Выбрать способ оплаты</h3>
            </div>
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

        <br>
        <br>

        <div class="payment-method-next">
            <button class="" type="submit">ДАЛЕЕ</button>
        </div>
    </div>
    {!! Form::close() !!}
@endsection
