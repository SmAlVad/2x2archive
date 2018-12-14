@extends('admin.layouts.app_admin')

@section('content')

    @include('admin.partials.errors')

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

        <button type="submit" class="btn btn-primary float-right">Создать</button>
    </form>
@endsection