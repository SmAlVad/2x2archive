@extends('admin.layouts.app_admin')

@section('content')

    @if($message = Session::get('success'))

        <div class="alert alert-success">
            <span>{{ $message }}</span>
            <button type="button" class="close" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>

    @endif

    @can('key-create')
    <a href="{{ route('admin.key.create') }}" class="btn btn-primary float-right">
        <i class="fas fa-plus"></i>
        Добавить
    </a>
    @endcan

    <table class="table table-striped">
        <thead>
        <tr>
            <th width="20%">Ключ</th>
            <th>Тариф</th>
            <th>Принадлежит</th>
            <th>Активирован</th>
            <th>Создал</th>
            <th>Когда</th>
            @can('key-delete')
                <th>Удалить</th>
            @endcan
        </tr>
        </thead>
        <tbody>
        @forelse($keys as $key)
            <tr>
                <td>{{$key->key}}</td>
                <td>{{$key->rate->name}}</td>
                <td>{{$key->user->name}}</td>
                <td class="text-center">
                    @if($key->active)
                        <div class="alert-success">ДА</div>
                    @else
                        <div class="alert-dark">НЕТ</div>
                    @endif
                </td>
                <td>{{$key->created_by}}</td>
                <td>{{$key->created_at}}</td>
                @can('key-delete')
                    <td class="text-right">
                        <form action="{{ route('admin.key.destroy', $key->id) }}" method="post">
                            @csrf
                            @method('DELETE')

                            <button type="submit" class="btn btn-danger"><i class="fas fa-trash-alt"></i></button>

                        </form>
                    </td>
                @endcan
            </tr>
        @empty
            <tr>
                <td colspan="7" class="text-center">
                    <h4>Данные отсутствуют</h4>
                </td>
            </tr>
        @endforelse
        </tbody>
        <tfoot>
        <tr>
            <td colspan="7">
                <ul class="pagination float-right">
                    {{$keys->links()}}
                </ul>
            </td>
        </tr>
        </tfoot>
    </table>
@endsection