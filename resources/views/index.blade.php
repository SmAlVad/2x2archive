@extends('layouts.app')

@section('content')
    {!! Form::open(['method' => 'GET']) !!}
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
                <div class="col-xl-3">
                    <div class="radio-container">
                        <div class="form-item radio-btn nth-3">
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
                <div class="radio-container">
                    <div class="form-item radio-btn nth-3">
                        <input type="radio" name="payment-alias" id="payment-method-1" value="EMoney">
                        <label for="payment-method-1">Электронным кошельком</label>
                    </div>
                </div>
            </div>
            <div class="col-2">
                <div class="radio-container">
                    <div class="form-item radio-btn nth-3">
                        <input type="radio" name="payment-alias" id="payment-method-2" value="Bank">
                        <label for="payment-method-2">Через интернет-банк</label>
                    </div>
                </div>
            </div>
            <div class="col-2">
                <div class="radio-container">
                    <div class="form-item radio-btn nth-3">
                        <input type="radio" name="payment-alias" id="payment-method-3" value="BankCard" checked>
                        <label for="payment-method-3">Банковской картой</label>
                    </div>
                </div>
            </div>
            <div class="col-2">
                <div class="radio-container">
                    <div class="form-item radio-btn nth-3">
                        <input type="radio" name="payment-alias" id="payment-method-4" value="Terminals">
                        <label for="payment-method-4">В терминале</label>
                    </div>
                </div>
            </div>
            <div class="col-2">
                <div class="radio-container">
                    <div class="form-item radio-btn nth-3">
                        <input type="radio" name="payment-alias" id="payment-method-5" value="1">
                        <label for="payment-method-5">Выписать счёт</label>
                    </div>
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
    {!! Form::close() !!}
@endsection
