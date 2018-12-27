@extends('admin.layouts.app_admin')

@section('content')

    @if($message = Session::get('success'))

        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>

    @endif

    <a href="{{route('admin.rate.create')}}" class="btn btn-primary float-right">
        <i class="fas fa-plus"></i>
        Добавить
    </a>

    <h3>Список тарифов</h3>

    <table class="table table-striped">
        <thead>
            <tr>
                <th>Название</th>
                <th>Кол-во часов</th>
                <th>Цена ₽</th>
                <th>Действия</th>
            </tr>
        </thead>
        <tbody>
            @forelse($rates as $rate)
                <tr>
                    <td>{{$rate->name}}</td>
                    <td>{{$rate->time}}</td>
                    <td>{{$rate->price}}</td>
                    <td>
                        <form action="{{route('admin.rate.destroy', $rate->id)}}" method="post">
                            @csrf
                            @method('DELETE')
                            <a class="btn btn-success" href="{{ route('admin.rate.edit', $rate) }}"><i class="fas fa-edit"></i></a>

                            <button type="submit" class="btn btn-danger"><i class="fas fa-trash-alt"></i></button>

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
        <tfoot>
            <tr>
                <td colspan="4">
                    <ul class="pagination float-right">
                        {{$rates->links()}}
                    </ul>
                </td>
            </tr>
        </tfoot>
    </table>
@endsection