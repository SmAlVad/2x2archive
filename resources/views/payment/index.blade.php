@extends('layouts.app')

@section('content')
    {!! Form::open(['route' => 'payment-confirm', 'method' => 'GET']) !!}
    <div class="container-fluid">
        {{-- Список тарифов --}}
        <div class="row justify-content-center">
            <div class="col-12">
                <h2>Выбрать тариф</h2>
            </div>
            @foreach($rates as $rate)
                <div class="col-xl-3">
                    <div class="radio-container">
                        <div class="form-item radio-btn">
                            <input type="radio" name="rate" id="rate-{{ $rate->id }}" value="{{ $rate->id }}"
                                    {{ ($rate->name == 'Расширенный') ? 'checked' : '' }}>
                            <label for="rate-{{ $rate->id }}">
                                {{ $rate->name  }} <br/>
                                Часов: {{ $rate->time }} <br/>
                                Цена: {{ $rate->price }}
                            </label>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        <br/>
        {{-- /Список тарифов --}}

        {{-- Способы оплаты --}}
        <div class="row justify-content-center">
            <div class="col-12">
                <h2>Выбрать способ оплаты</h2>
            </div>
            @foreach($paymentMethods as $pM)
                <div class="col-xl-1">
                    <div class="wrapper-payment-method">
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
        {{-- /Способы оплаты --}}

        <br/>
        <div class="row justify-content-center">
            <div class="col-6">
                <button class="btn btn-primary btn-lg btn-block" type="submit">ДАЛЕЕ</button>
            </div>
        </div>
    </div>
    {!! Form::close() !!}
@endsection
