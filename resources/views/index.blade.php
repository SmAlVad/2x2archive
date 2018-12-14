@extends('layouts.app')

@section('content')
    <div class="container-fluid">

        {{-- Список тарифов --}}
        <div class="row justify-content-center">
            <div class="col-12">
                <a href="https://auth.robokassa.ru/Merchant/WebService/Service.asmx/GetCurrencies?MerchantLogin=gazeta.2x2.su&Language=ru">XML Робокасса</a>
            </div>
            <div class="col-12">
                <h2>Выбрать тариф</h2>
            </div>
            @forelse($rates as $rate)
                <div class="col-3">
                    <div class="rate">
                        <div>
                            <h3>{{ $rate->name }}</h3>
                            <p>Часов: {{ $rate->time }}</p>
                            <p>Цена: {{ $rate->price }} ₽</p>
                        </div>
                    </div>
                </div>
            @empty
                <h4>Данные отсутствуют</h4>
            @endforelse
        </div>
        <br/>
        {{-- /Список тарифов --}}

        {{-- Способы оплаты --}}
        <div class="row justify-content-center">
            <div class="col-12">
                <h2>Выбрать способ оплаты</h2>
            </div>
            <div class="col-2">
                <div class="payment-method">
                    <h3>Электронным кошельком</h3>
                </div>
            </div>
            <div class="col-2">
                <div class="payment-method">
                    <h3>Через интернет-банк</h3>
                </div>
            </div>
            <div class="col-2">
                <div class="payment-method">
                    <h3>Банковской картой</h3>
                </div>
            </div>
            <div class="col-2">
                <div class="payment-method">
                    <h3>В терминале</h3>
                </div>
            </div>
            <div class="col-2">
                <div class="payment-method">
                    <h3>Выписать счёт</h3>
                </div>
            </div>
        </div>
        {{-- /Способы оплаты --}}

        <br/>
        <div class="row justify-content-center">
            <div class="col-6">
                <button  class="btn btn-primary btn-lg btn-block">ДАЛЕЕ</button>
            </div>
        </div>
    </div>
@endsection
