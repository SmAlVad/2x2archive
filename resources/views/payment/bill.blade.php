@extends('layouts.app')

@section('content')
    <div class="container-fluid" id="billForm">
        <div class="row justify-content-center">
            <div class="col-xl-6">
                <h3>Внесите данные вашей организации для выставления счета</h3>

                @include('admin.partials.errors')

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
                    {!! Form::label('account', 'Счёт №') !!}
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

                {!! Form::submit('Оплатить', ['class' => 'btn btn-primary']); !!}
                {!! Form::close() !!}
            </div>
        </div>
    </div>
@endsection