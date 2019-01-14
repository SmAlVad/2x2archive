@extends('admin.layouts.app_admin')

@section('content')

    @if($message = Session::get('success'))

        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>

    @endif

    <a href="{{route('admin.payment-methods.create')}}" class="btn btn-primary float-right">
        <i class="fas fa-plus"></i>
        Добавить
    </a>
    <h3>Список способов оплаты</h3>

    <a href="https://auth.robokassa.ru/Merchant/WebService/Service.asmx/GetCurrencies?MerchantLogin=gazeta.2x2.su&Language=ru">XML
        Робокасса</a>

    <table class="table table-striped">
        <thead>
            <tr>
                <th>Активен?</th>
                <th>Название</th>
                <th>Label</th>
                <th>Alias</th>
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
                    <td>{{ $method->rk_label }}</td>
                    <td>{{ $method->rk_alias }}</td>
                    <td>
                        @if($method->image)
                            <img width="100px" src="{{asset('/storage/payment-methods/' . $method->image)}}">
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

                            <button type="submit" class="btn btn-danger" onclick="return confirm('Вы уверены?')"><i class="fas fa-trash-alt"></i></button>
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