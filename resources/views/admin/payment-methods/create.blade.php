@extends('admin.layouts.app_admin')

@section('content')
    @component('admin.components.breadcrumb')
        @slot('title') Добавление способа оплаты @endslot
        @slot('parent') Главная @endslot
        @slot('active') Способы оплаты @endslot
    @endcomponent

    @include('admin.rates.partials.errors')
    @include('admin.payment-methods.partials.upload-file')
    
    @isset($path)
        <img src="{{asset('/storage/' . $path)}}">
        <hr/>
    @endisset

    <form action="{{route('admin.payment-methods.store')}}" method="post">
        @csrf

        <div class="form-group">
            <label for="input-name">Название</label>
            <input type="text" class="form-control" id="input-name" name="name" required>
        </div>

        <div class="form-group">
            <label for="input-time">Робокасса</label>
            <input type="text" class="form-control" id="input-time" name="robokassa" required>
        </div>

        @isset($path)
            <input type="hidden"  name="image" value="{{ $path }}">
        @endisset

        <div class="form-group">
            <label for="input-on-off">Вкл/Выкл</label>
            <select id="input-on-off" class="form-control" name="on_off">
                <option selected value="1">Да</option>
                <option value="0">Нет</option>
            </select>
        </div>

        <button type="submit" class="btn btn-primary float-right">Создать</button>
    </form>
@endsection