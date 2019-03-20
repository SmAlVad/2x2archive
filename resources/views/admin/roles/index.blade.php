@extends('admin.layouts.app_admin')

@section('content')

    @include('admin.partials.success')

    <a href="{{route('admin.roles.create')}}" class="btn btn-primary float-right">
        <i class="fas fa-plus"></i>
        Добавить
    </a>

    <table class="table table-striped">
        <tr>
            <th>#</th>
            <th>Название</th>
            <th>Действия</th>
        </tr>

        @forelse ($roles as $key => $role)
            <tr>
                <td>{{ ++$i }}</td>
                <td>{{ $role->name }}</td>
                <td>
                    <form action="{{route('admin.roles.destroy', $role->id)}}" method="post">
                        @csrf
                        @method('DELETE')
                        <a class="btn btn-success" href="{{ route('admin.roles.edit', $role->id) }}"><i
                                    class="fas fa-edit"></i></a>

                        <button type="submit" class="btn btn-danger"><i class="fas fa-trash-alt"></i></button>

                    </form>
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="3" class="text-center">
                    <h4>Данные отсутствуют</h4>
                </td>
            </tr>
        @endforelse

    </table>

@endsection
