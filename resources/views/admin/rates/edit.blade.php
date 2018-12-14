@extends('admin.layouts.app_admin')

@section('content')

    @include('admin.partials.errors')

    <form action="{{route('admin.rate.update', $rate->id)}}" method="post">
        <input type="hidden" name="_method" value="put">

        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="input-name">Название</label>
            <input type="text" class="form-control" id="input-name" name="name" value="{{$rate->name}}" required>
        </div>

        <div class="form-group">
            <label for="input-time">Количество часов</label>
            <input type="text" class="form-control" id="input-time" name="time" value="{{$rate->time}}" required>
        </div>

        <div class="form-group">
            <label for="input-time">Цена ₽</label>
            <input type="text" class="form-control" id="input-price" name="price" value="{{$rate->price}}" required>
        </div>

        <button type="submit" class="btn btn-primary float-right">Редактировать</button>
    </form>
@endsection