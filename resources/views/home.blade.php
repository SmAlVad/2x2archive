@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-xl-12">
                <h2>Личный кабинет</h2>
            </div>
        </div>

        <div class="row">
            {{-- Блок вывода уведомлений --}}
            <div class="col-xl-12">
                @if($message = Session::get('success'))

                    <div class="alert alert-success">
                        <span>{{ $message }}</span>
                        <button type="button" class="close" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>

                @endif
            </div>
            {{-- /Блок вывода уведомлений --}}
        </div>

        <div class="row">
            {{-- Блок вывода таблицы ключей --}}
            <div class="col-xl-6">
                <h3>Мои ключи</h3>
                <table class="table table-hover">
                    <thead>
                    <tr>
                        <th>Ключ</th>
                        <th>Количество часов</th>
                        <th>Действие</th>
                    </tr>
                    </thead>
                    <tbody>
                    @php /** @var \App\Models\Key $key **/@endphp
                    @forelse($keys as $key)
                        <tr>
                            <td>{{ $key->key }}</td>
                            <td>{{ $key->rate->time }}</td>
                            <td>
                                <form action="{{ route('set-time') }}" method="POST">
                                    @csrf
                                    <input type="hidden" value="{{ $key->id }}" name="key">
                                    <button type="submit" class="btn btn-primary"
                                            onclick="return confirm('Вы уверены?')">
                                        активировать
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="3">
                                <span class="badge badge-secondary">Ключей нет</span>
                            </td>
                        </tr>
                    @endforelse
                    </tbody>
                </table>

            </div>
            {{-- /Блок вывода таблицы ключей --}}

            <div class="col-xl-6">
                <h3>Подписка</h3>
                @if(Auth::user()->time > $timeNow)
                    <span class="badge badge-success" style="font-size: 1.5rem;">{{ $activeTime }}&nbsp;конца подписки</span>
                @else
                    <div class="badge badge-secondary">Нет активной подписки</div>
                @endif
            </div>

            {{-- Блок вывода таблицы счетов --}}
            <div class="col-xl-12">
                <h3>Мои счета</h3>
                @php /** @var \App\Models\Account $account **/@endphp
                <table class="table table-hover">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>Номер счета</th>
                        <th>Дата</th>
                        <th>Сумма(руб.)</th>
                        <th>Статус</th>
                        <th>Счет</th>
                        <th>Акт выполненных работ</th>
                    </tr>
                    </thead>
                    <tbody>
                    @forelse($accounts as $account)
                        <tr>
                            <td>
                                @if($account->is_paid)
                                    <div class="text-success"><i class="fas fa-check-circle"></i></div>
                                @else
                                    <div class="text-muted"><i class="fas fa-times-circle"></i></div>
                                @endif
                            </td>
                            <td>И{{ $account->number }}</td>
                            <td>{{ $account->created_at }}</td>
                            <td>{{ $account->rate->price }}</td>
                            <td> @if($account->is_paid)
                                    оплачен
                                @else
                                    не оплачен
                                @endif
                            </td>
                            <td>
                                <a href="{{ route('admin.accounts.print_acc', $account->id) }}">
                                    Распечатать
                                </a>
                            </td>
                            <td>
                                @if($account->is_paid)
                                    <a href="{{ route('admin.accounts.print_act', $account->id) }}">
                                        Распечатать
                                    </a>
                                @endif
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7">
                                <span class="badge badge-secondary">Счетов нет</span>
                            </td>
                        </tr>
                    @endforelse
                    </tbody>

                </table>
            </div>
            {{--/ Блок вывода таблицы счетов --}}
        </div>
    </div>
@endsection
