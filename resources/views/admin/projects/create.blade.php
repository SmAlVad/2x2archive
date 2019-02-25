@extends('admin.layouts.app_admin')

@section('content')

    @include('admin.partials.errors')

    <h3>Добавление проекта</h3>
    <form action="{{route('admin.project.store')}}" method="post">
        @csrf

        <div class="form-group">
            <label for="input-name">Название</label>
            <input type="text" class="form-control" id="input-name" name="name" required>
        </div>

        <div class="form-group">
            <label for="input-slug">Слаг, уникальное название на латинице</label>
            <input type="text" class="form-control" id="input-slug" name="slug" required>
        </div>

        <div class="form-group">
            <label for="input-time">Сортировка</label>
            <input type="text" class="form-control" id="input-time" name="sort" value="0">
        </div>

        <button type="submit" class="btn btn-primary float-right">Добавить</button>
    </form>
@endsection