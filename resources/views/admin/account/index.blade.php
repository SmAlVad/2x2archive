@extends('admin.layouts.app_admin')

@section('content')

    @include('admin.partials.success')

    <form action="{{ route('admin.accounts.search') }}" method="GET" class="form-inline my-3">
        <div class="form-group">
            <label for="acc-number">Номер</label>
            <input type="text" class="form-control ml-2"
                   id="acc-number" name="number"
                   @isset($num) value="{{ $num }}" @endisset
                   placeholder="только цыфры"
                   required>
        </div>
        <div class="form-group">
            <label for="acc-start-day" class="ml-5">с</label>
            <input type="date" id="acc-start-day" name="start" class="ml-2"
                   value="2019-01-01"
                   min="2019-01-01" max="{{ date('Y-m-d') }}">
        </div>
        <div class="form-group">
            <label for="acc-end-day" class="ml-2">по</label>
            <input type="date" id="acc-end-day" name="end" class="ml-2"
                   value="{{ date('Y-m-d') }}"
                   min="2019-01-01" max="{{ date('Y-m-d') }}">
        </div>
        <button type="submit" class="btn btn-primary ml-5">Найти</button>
    </form>
    
    <table class="table table-striped">
        <thead>
        <tr>
            <th>#</th>
            <th>Номер</th>
            <th>Дата</th>
            <th>Сумма(руб.)</th>
            <th>Пользователь</th>
            <th>Оплачен</th>
            <th>Аннулирован</th>
            <th>Печать счёта</th>
            <th>Печать акта</th>
        </tr>
        </thead>
        <tbody>
        @forelse($accounts as $account)
            <tr>
                <td>
                    @if($account->is_paid)
                        <div class="text-success" style="font-size: 1.5rem;"><i class="fas fa-check-circle"></i></div>
                    @else
                        <div class="text-muted" style="font-size: 1.5rem;"><i class="fas fa-times-circle"></i></div>
                    @endif
                </td>
                <td>И{{$account->number}}</td>
                <td>{{$account->created_at}}</td>
                <td>{{$account->rate->price}}</td>
                <td>{{$account->user->name}}</td>
                <td class="text-center">
                    @if($account->is_paid)
                        <div class="alert-success">ДА</div>
                    @else
                        @can('key-delete')
                            <form action="{{ route('admin.accounts.activate', $account->id) }}" method="post">
                                @csrf
                                @method('PATCH')

                                <button type="submit" class="btn btn-primary btn-sm" onclick="return confirm('Вы уверены?')">оплатить</button>

                            </form>
                        @endcan
                    @endif
                </td>
                <td class="text-center">
                    @if($account->is_cancelled)
                        <div class="alert-warning">ДА</div>
                    @else
                        @can('key-delete')
                            <form action="{{ route('admin.accounts.cancelled', $account->id) }}" method="post">
                                @csrf
                                @method('PATCH')

                                <button type="submit" class="btn btn-primary btn-sm" onclick="return confirm('Вы уверены?')">аннулировать</button>

                            </form>
                        @endcan
                    @endif
                </td>
                <td class="text-center" >
                    <a href="{{ route('admin.accounts.print_acc', $account->id) }}" style="font-size: 1.2rem" class="btn btn-secondary">
                        <i class="fas fa-print"></i>
                    </a>
                </td>
                <td class="text-center">
                    @if($account->is_paid)
                        <a href="{{ route('admin.accounts.print_act', $account->id) }}" style="font-size: 1.2rem" class="btn btn-secondary">
                            <i class="fas fa-print"></i>
                        </a>
                    @endif
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="9" class="text-center">
                    <h4>Данные отсутствуют</h4>
                </td>
            </tr>
        @endforelse
        </tbody>
        <tfoot>
        <tr>
            <td colspan="9">
                <ul class="pagination float-right">
                    {{$accounts->links()}}
                </ul>
            </td>
        </tr>
        </tfoot>
    </table>
@endsection