@extends('layouts.app')

@section('content')
    <div class="container-fluid" id="billForm">
        {{-- Хлебные крошки --}}
        <ul class="app-breadcrumb">
            <li class="app-breadcrumb-item">
                <a href="{{ route('index') }}">Главная</a>
            </li>
            <li class="app-breadcrumb-item">
                <a href="{{ route('payment-index') }}">Купить ключ</a>
            </li>
            <li class="app-breadcrumb-active">
                Выставить счет
            </li>
        </ul>

        <div class="row justify-content-center mb-5">
            <div class="col-xl-6">
                <h3>Внесите данные вашей организации для выставления счёта</h3>

                @include('partials.errors')

                {!! Form::open(['route' => 'payment-bill', 'method' => 'POST']) !!}
                {!! Form::hidden('rate', $rate->id) !!}

                <div class="form-group">
                    {!! Form::label('recipient', 'Получатель') !!}
                    {!! Form::text('recipient', old('recipient'),['id' => 'bill-recipient', 'class' => 'form-control', 'required' => 'required']); !!}
                </div>

                <div class="form-group">
                    {!! Form::label('inn', 'ИНН') !!}
                    {!! Form::text('inn', old('inn'),
                    ['id' => 'bill-inn', 'class' => 'form-control', 'required' => 'required']); !!}
                </div>

                <div class="form-group">
                    {!! Form::label('kpp', 'КПП') !!}
                    {!! Form::text('kpp', old('kpp'), ['id' => 'bill-kp', 'class' => 'form-control', 'required' => 'required']); !!}
                </div>

                <div class="form-group">
                    {!! Form::label('bank', 'Банк получателя') !!}
                    {!! Form::text('bank', old('bank'), ['class' => 'form-control', 'required' => 'required']); !!}
                </div>

                <div class="form-group">
                    {!! Form::label('account', 'Расчётный счёт №') !!}
                    {!! Form::text('account', old('account'), ['id' => 'bill-account', 'class' => 'form-control', 'required' => 'required']); !!}
                </div>

                <div class="form-group">
                    {!! Form::label('bik', 'БИК/Код МФО') !!}
                    {!! Form::text('bik', old('bik'), ['id' => 'bill-bik', 'class' => 'form-control', 'required' => 'required']); !!}
                </div>

                <div class="form-group">
                    {!! Form::label('ks', 'Корреспонденский счет') !!}
                    {!! Form::text('ks', old('ks'), ['id' => 'bill-ks', 'class' => 'form-control', 'required' => 'required']); !!}
                </div>

                <div class="form-group">
                    {!! Form::label('address', 'Адрес') !!}
                    {!! Form::text('address', old('address'), ['class' => 'form-control', 'required' => 'required']); !!}
                </div>

                <div class="form-group">
                    {!! Form::label('phone', 'Телефон') !!}
                    {!! Form::text('phone', old('phone'), ['id' => 'bill-phone', 'class' => 'form-control', 'required' => 'required', 'data-mask' => '+ 0 (000) 000-00-00']); !!}
                </div>

                {!! Form::submit('Продолжить', ['class' => 'app-btn']); !!}
                {!! Form::close() !!}
            </div>
        </div>
    </div>
@endsection
