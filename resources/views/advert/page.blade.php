@extends('layouts.app')

@section('content')

    <div class="adv-search-panel">

        <div id="right-slide-menu-btn"><i class="fas fa-bars"></i></div>

        @include('partials.advert.search')

    </div>

    {{-- Хлебные крошки --}}
    <ul class="app-breadcrumb">
        <li class="app-breadcrumb-item">
            <a href="{{ route('index') }}">Главная</a>
        </li>
        <li class="app-breadcrumb-item">
            <a href="{{ route('advert-index') }}">Обьявления</a>
        </li>
        <li class="app-breadcrumb-active">
            Поиск
        </li>
    </ul>


    {{--Result--}}
    <div class="adv-search-result">

        @isset($adverts)

            @if($adverts->total())
                <div class="adv-pagination-top">
                    {{$adverts->links()}}
                    <div class="">Формат даты: гггг-мм-дд</div>
                    <h5>Найдено:&nbsp;<span class="badge badge-success">{{ $adverts->total() }}</span>&nbsp;обьявлений</h5>
                </div>
            @endif

                <table class="table table-striped">
                <thead>
                    <tr>
                        <th width="10%">Фото</th>
                        <th>Заголовок</th>
                        <th>Текст</th>
                        <th width="5%">Цена, ₽</th>
                        <th>Имя</th>
                        <th>Телефон</th>
                        <th>E-mail</th>
                        <th>Подача</th>
                        <th>Окончание</th>
                    </tr>
                </thead>
                <tbody>
                @forelse($adverts as $advert)
                    <tr>
                        <td><img src="https://2x2.su/{{ $advert->image }}" alt=""></td>
                        <td>{{ $advert->title }}</td>
                        <td>{{ $advert->body }}</td>
                        <td>{{ $advert->price }}</td>
                        <td>{{ $advert->name }}</td>
                        <td>{{ $advert->tel}}</td>
                        <td>{{ $advert->email }}</td>
                        <td>{{ $advert->date_start }}</td>
                        <td>{{ $advert->date_end }}</td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="9">
                            <div class="empty-result">
                                <i class="far fa-frown"></i>&nbsp;Ничего не найдено
                            </div>
                        </td>
                    </tr>
                @endforelse
                </tbody>
            </table>
            <div class="adv-pagination-bottom">
                {{$adverts->links()}}
            </div>
        @endisset
    </div>

    @isset($show_explain)
        <div class="adv-search-explain">
            <div class="">
                <h5>Заполните необходимые поля</h5>
                <img src="{{ asset('image/read.png') }}" alt="">
            </div>
        </div>
    @endisset

    @include('partials.advert.right_slide_menu')

@endsection
