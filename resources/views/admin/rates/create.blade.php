@extends('admin.layouts.app_admin')

@section('content')

    @include('admin.partials.errors')

    <h3>Добавление тарифа</h3>

    <form action="{{route('admin.rate.store')}}" method="post">
        @csrf

        <div class="form-group">
            <label for="input-name">Название</label>
            <input type="text" class="form-control" id="input-name" name="name" required>
        </div>

        <div class="form-group">
            <label for="input-time">Количество часов</label>
            <input type="text" class="form-control" id="input-time" name="time" required>
        </div>

        <div class="form-group">
            <label for="input-time">Цена ₽</label>
            <input type="text" class="form-control" id="input-price" name="price" required>
        </div>

        <button type="submit" class="btn btn-primary float-right">Добавить</button>
    </form>
@endsection