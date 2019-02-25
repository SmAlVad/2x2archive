@extends('admin.layouts.app_admin')

@section('content')

    @include('admin.partials.errors')
    <h3>Изменение проекта</h3>
    <form action="{{route('admin.project.update', $project->id)}}" method="post">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="input-name">Название</label>
            <input type="text" class="form-control" id="input-name" name="name" value="{{$project->name}}" required>
        </div>

        <div class="form-group">
            <label for="input-slug">Слаг, уникальное название на латинице</label>
            <input type="text" class="form-control" id="input-slug" name="slug" value="{{$project->slug}}" required>
        </div>

        <div class="form-group">
            <label for="input-time">Сортировка</label>
            <input type="text" class="form-control" id="input-time" name="sort" value="{{$project->sort}}">
        </div>

        <button type="submit" class="btn btn-primary float-right">Изменить</button>
    </form>
@endsection