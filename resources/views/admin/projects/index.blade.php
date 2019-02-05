@extends('admin.layouts.app_admin')

@section('content')

    @include('admin.partials.success')

    <a href="{{route('admin.project.create')}}" class="btn btn-primary float-right">
        <i class="fas fa-plus"></i>
        Добавить
    </a>

    <h3>Список проектов</h3>
    <table class="table table-striped">
        <thead>
        <tr>
            <th>ID</th>
            <th>Название</th>
            <th>Сортировка</th>
            <th>Действия</th>
        </tr>
        </thead>
        <tbody>
        @forelse($projects as $project)
            <tr>
                <td>{{$project->id}}</td>
                <td>{{$project->name}}</td>
                <td>{{$project->sort}}</td>
                <td>
                    <form action="{{route('admin.project.destroy', $project->id)}}" method="post">
                        @csrf
                        @method('DELETE')
                        <a class="btn btn-success" href="{{ route('admin.project.edit', $project) }}"><i class="fas fa-edit"></i></a>

                        <button type="submit" class="btn btn-danger" onclick="return confirm('Вы уверены?')"><i class="fas fa-trash-alt"></i></button>

                    </form>
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="4" class="text-center">
                    <h4>Данные отсутствуют</h4>
                </td>
            </tr>
        @endforelse
        </tbody>
    </table>
@endsection