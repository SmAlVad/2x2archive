@extends('layouts.app')

@section('content')

    {{-- Хлебные крошки --}}
    <ul class="app-breadcrumb">
        <li class="app-breadcrumb-item">
            <a href="{{ route('index') }}">Главная</a>
        </li>
        <li class="app-breadcrumb-active">
            Личный кабинет
        </li>
    </ul>

    <div class="container" id="personal-office-block">
        {{-- Блок вывода уведомлений --}}
        <div class="row">
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
        </div>

        <div class="row">

            {{-- Персональная информация --}}
            <div class="col-xl-12">
                <div class="home-block">
                    <div class="container">
                        <div class="row">
                            <div class="col-xl-4">
                                <span>Пользователь:</span>&nbsp;<strong>{{ Auth::user()->name }}</strong>
                            </div>
                            <div class="col-xl-4">
                                <span>E-mail:</span>&nbsp;<strong>{{ Auth::user()->email }}</strong>
                            </div>
                            <div class="col-xl-4">
                                <span>Окончание подписки:</span>&nbsp;<strong>{{ Auth::user()->time }}</strong>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Если нет времени и нет ключей --}}
            @if(count($keys) === 0 && Auth::user()->time < $timeNow)
                <div class="col-xl-12">
                    <div class="pb-5">
                        <h4>В данный момент вы имеете ограниченный доступ. Для получения полного, нажмите на кнопку</h4>
                    </div>
                    <a href="{{ route('payment-index') }}" class="app-btn home-redirect-btn w-50">Купить ключ</a>
                </div>
            @endif

            {{-- Если есть время --}}
            @if(Auth::user()->time > $timeNow)
                <div class="col-xl-12">
                    <div class="home-block">
                        <h4>У Вас&nbsp;
                            <span class="badge badge-success"
                                  style="font-size: 1.5rem;">{{ $activeTime }}&nbsp;конца подписки</span>
                        </h4>
                    </div>
                </div>
            @endif


            {{-- Если есть ключи --}}
            @if(count($keys) !== 0)
                <div class="col-xl-12">
                    <div class="home-block">
                        <h3>Есть не активированные ключи</h3>
                        <p>
                            Вы можете активировать ключ в любое удобное время. Нажав на кнопку «Активировать», начнется отсчет времени пользования.
                            Если у вас уже есть активированные ключи, то время нового ключа добавится к уже существующему.
                        </p>
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
                            @foreach($keys as $key)
                                <tr>
                                    <td>{{ $key->key }}</td>
                                    <td>{{ $key->rate->time }}</td>
                                    <td>
                                        <form action="{{ route('set-time') }}" method="POST">
                                            @csrf
                                            <input type="hidden" value="{{ $key->id }}" name="key">
                                            <button type="submit" class="app-btn"
                                                    onclick="return confirm('Вы уверены?')">
                                                активировать
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            @endif

            {{-- Если есть счета --}}
            @if(count($accounts) !== 0)
                <div class="col-xl-12">
                    <div class="home-block">
                        <h3>Счета</h3>
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
                            @foreach($accounts as $account)
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
                            @endforeach
                            </tbody>

                        </table>
                    </div>
                </div>
            @endif
        </div>
    </div>
@endsection
