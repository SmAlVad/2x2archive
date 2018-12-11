@extends('admin.layouts.app_admin')

@section('content')
    @component('admin.components.breadcrumb')
        @slot('title') Редактирование способа оплаты @endslot
        @slot('parent') Главная @endslot
        @slot('active') Способы оплаты @endslot
    @endcomponent

    @include('admin.rates.partials.errors')

    <form action="{{route('admin.payment-methods.update', $paymentMethod->id)}}" method="post">
        <input type="hidden" name="_method" value="put">

        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="input-name">Название</label>
            <input type="text" class="form-control" id="input-name" name="name" value="{{$paymentMethod->name}}" required>
        </div>

        <div class="form-group">
            <label for="input-time">Робокасса</label>
            <input type="text" class="form-control" id="input-time" name="robokassa" value="{{$paymentMethod->robokassa}}" required>
        </div>

        <div class="form-group">
            <label for="input-time">Изображение</label>
            <input type="text" class="form-control" id="input-price" name="image" value="{{$paymentMethod->image}}">
        </div>

        <div class="form-group">
            <label for="input-on-off">Вкл/Выкл</label>
            <select id="input-on-off" class="form-control" name="on_off">
                <option @if($paymentMethod->on_off ==1) selected @endif value="1">Да</option>

                <option @if($paymentMethod->on_off ==0) selected @endif value="0">Нет</option>
            </select>
        </div>

        <button type="submit" class="btn btn-primary float-right">Редактировать</button>
    </form>
@endsection