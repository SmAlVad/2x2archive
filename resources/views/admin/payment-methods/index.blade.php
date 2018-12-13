@extends('admin.layouts.app_admin')

@section('content')
    @component('admin.components.breadcrumb')
        @slot('title')  Способы оплаты @endslot
        @slot('parent') Главная @endslot
        @slot('active') Способы оплыты @endslot
    @endcomponent

    @if($message = Session::get('success'))

        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>

    @endif

    <a href="{{route('admin.payment-methods.create')}}" class="btn btn-primary float-right">
        <i class="fas fa-plus"></i>
        Добавить
    </a>

    <table class="table table-striped">
        <thead>
            <tr>
                <th>Активен?</th>
                <th>Название</th>
                <th>Робокасса</th>
                <th>Изображение</th>
                <th>Вкл/Выкл</th>
                <th>Действия</th>
            </tr>
        </thead>
        <tbody>
            @forelse($paymentMethods as $method)
                <tr>
                    @if($method->on_off)
                        <td>
                            <div class="alert-success text-center">
                                ДA
                            </div>
                        </td>
                    @else
                        <td>
                            <div class="alert-danger text-center">
                                НЕТ
                            </div>
                        </td>
                    @endif

                    <td>{{ $method->name }}</td>
                    <td>{{ $method->robokassa }}</td>
                    <td>
                        @if($method->image)
                            <img width="100px" src="{{asset('/storage/' . $method->image)}}">
                        @else
                            Нет изображения
                        @endif
                    </td>
                    <td>

                        @if($method->on_off)
                            <form action="{{route('admin.payment-methods.active-off')}}" method="post">
                                @csrf
                                <input type="hidden" name="id" value="{{ $method->id  }}">
                                <button type="submit" class="btn btn-outline-success"><i class="fas fa-toggle-on"></i></button>
                            </form>
                        @else
                            <form action="{{route('admin.payment-methods.active-on')}}" method="post">
                                @csrf
                                <input type="hidden" name="id" value="{{ $method->id  }}">
                                <button type="submit" class="btn btn-outline-secondary"><i class="fas fa-toggle-off"></i></button>
                            </form>
                        @endif

                    </td>
                    <td>
                        <form action="{{route('admin.payment-methods.destroy', $method->id)}}" method="post">
                            @csrf
                            @method('DELETE')
                            <a class="btn btn-success" href="{{ route('admin.payment-methods.edit', $method) }}"><i class="fas fa-edit"></i></a>

                            <button type="submit" class="btn btn-danger"><i class="fas fa-trash-alt"></i></button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="6" class="text-center">
                        <h4>Данные отсутствуют</h4>
                    </td>
                </tr>
            @endforelse
        </tbody>
        <tfoot>
            <tr>
                <td colspan="6">
                    <ul class="pagination float-right">
                        {{$paymentMethods->links()}}
                    </ul>
                </td>
            </tr>
        </tfoot>
    </table>
@endsection