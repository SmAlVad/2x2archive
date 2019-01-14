@extends('admin.layouts.app_admin')

@section('content')

    @include('admin.partials.errors')

    {!! Form::open(['route' => 'admin.payment-methods.store', 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
    <div class="input-group">
        <div class="custom-file">
            {!! Form::file('image') !!}
        </div>
    </div>
    <div class="form-group">
        <label for="input-name">Название</label>
        <input type="text" class="form-control" id="input-name" name="name" required>
    </div>

    <div class="form-group">
        <label for="input-rk-label">Label</label>
        <input type="text" class="form-control" id="input-rk-label" name="rk-label" required>
    </div>

    <div class="form-group">
        <label for="input-rk-alias">Alias</label>
        <input type="text" class="form-control" id="input-rk-alias" name="rk-alias" required>
    </div>

    <div class="form-group">
        <label for="input-on-off">Вкл/Выкл</label>
        <select id="input-on-off" class="form-control" name="on-off">
            <option selected value="1">Да</option>
            <option value="0">Нет</option>
        </select>
    </div>
    {!! Form::submit('Добавить', ['class' => 'btn btn-primary']); !!}
    {!! Form::close() !!}
@endsection