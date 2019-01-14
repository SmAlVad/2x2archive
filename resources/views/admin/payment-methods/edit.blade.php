@extends('admin.layouts.app_admin')

@section('content')

    @include('admin.partials.errors')
    <h3>Изменение способа оплаты</h3>

    {!! Form::open(['route' => ['admin.payment-methods.update', $paymentMethod->id], 'method' => 'PATCH', 'enctype' => 'multipart/form-data']) !!}
    <div class="input-group" style="display: block;">
        <div class="alert alert-primary" role="alert">
            Если фаил не выбран то остается старый
        </div>
        <div class="custom-file">
            {!! Form::file('image') !!}
        </div>
    </div>

    <div class="form-group">
        <label for="input-name">Название</label>
        <input type="text" class="form-control" id="input-name" name="name" value="{{$paymentMethod->name}}" required>
    </div>

    <div class="form-group">
        <label for="input-rk-label">Label</label>
        <input type="text" class="form-control" id="input-rk-label" name="rk-label" value="{{$paymentMethod->rk_label}}"
               required>
    </div>

    <div class="form-group">
        <label for="input-rk-alias">Alias</label>
        <input type="text" class="form-control" id="input-rk-alias" name="rk-alias" value="{{$paymentMethod->rk_alias}}"
               required>
    </div>

    <div class="form-group">
        <label for="input-on-off">Вкл/Выкл</label>
        <select id="input-on-off" class="form-control" name="on-off">
            <option @if($paymentMethod->on_off ==1) selected @endif value="1">Да</option>

            <option @if($paymentMethod->on_off ==0) selected @endif value="0">Нет</option>
        </select>
    </div>

    {!! Form::submit('Изменить', ['class' => 'btn btn-primary']); !!}
    {!! Form::close() !!}
@endsection