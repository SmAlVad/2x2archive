@extends('admin.layouts.app_admin')

@section('content')
    @component('admin.components.breadcrumb')
        @slot('title') Список ключей @endslot
        @slot('parent') Главная @endslot
        @slot('active') Ключи @endslot
    @endcomponent

    @if($message = Session::get('success'))

        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>

    @endif

    <a href="{{ route('admin.key.create') }}" class="btn btn-primary float-right">
        <i class="fas fa-plus"></i>
        Добавить
    </a>

    <table class="table table-striped">
        <thead>
            <tr>
                <th width="20%">Ключ</th>
                <th>Тариф</th>
                <th>Принадлежит</th>
                <th>Активирован</th>
                <th>Создал</th>
                <th>Когда</th>
                <th>Удалить</th>
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
                    <td class="text-right">
                        <form action="{{ route('admin.key.destroy', $key->id) }}" method="post">
                            @csrf
                            @method('DELETE')

                            <button type="submit" class="btn btn-danger"><i class="fas fa-trash-alt"></i></button>

                        </form>
                    </td>
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