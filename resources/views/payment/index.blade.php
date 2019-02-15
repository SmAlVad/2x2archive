@extends('layouts.app')

@section('content')
    {!! Form::open(['route' => 'payment-confirm', 'method' => 'GET']) !!}
    <div class="container-fluid py-4">
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
                <h3>Выберите тариф</h3>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Necessitatibus, ullam.</p>
            </div>
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

        <br/>

        {{-- Способы оплаты --}}
        <div class="payment-method">
            <div class="payment-method-title">
                <h3>Выберите способ оплаты</h3>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Necessitatibus, ullam.</p>
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
            <div class="payment-method-next-fluid">
                <a href="#">Остались вопросы?</a>
            </div>
            <div class="payment-method-next-btn">
                <button class="" type="submit">ДАЛЕЕ</button>
            </div>
        </div>
    </div>
    {!! Form::close() !!}
@endsection
