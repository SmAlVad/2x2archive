@extends('layouts.app')

@section('content')
    {{-- Хлебные крошки --}}
    <ul class="app-breadcrumb">
        <li class="app-breadcrumb-item">
            <a href="{{ route('index') }}">Главная</a>
        </li>
        <li class="app-breadcrumb-item">
            <a href="{{ route('payment-index') }}">Купить ключ</a>
        </li>
        <li class="app-breadcrumb-active">
            Подтверждение
        </li>
    </ul>

    <div class="container mb-5" id="payment-confirm-block">
        <div class="row">
            <div class="col-xl-12">
                <h2>Подтверждение</h2>
                <p>
                    После успешной оплаты вы попадете в Личный кабинет. Там вы сможете активировать ключ доступа.
                </p>
            </div>
            <div class="col-xl-12 text-center">
                {!! Form::open(['url' => $url, 'method' => 'POST']) !!}

                @foreach($params as $name => $value)
                    {!! Form::hidden($name, $value); !!}
                @endforeach

                {!! Form::submit('Оплатить', ['class' => 'app-btn w-50 mt-4']); !!}
                {!! Form::close() !!}
            </div>
        </div>
    </div>
@endsection
