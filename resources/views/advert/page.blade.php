@extends('layouts.app')

@section('content')

    <div class="adv-search-panel">

        <div id="right-slide-menu-btn"><i class="fas fa-bars"></i></div>

        @include('partials.advert.search')

    </div>

    {{--Result--}}
    <div class="adv-search-result">

        @isset($adverts)
            <div class="adv-pagination-top">
                {{$adverts->links()}}
                <h5>Найдено:&nbsp;<span class="badge badge-success">{{ $adverts->total() }}</span>&nbsp;обьявлений</h5>
            </div>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th width="10%">Фото</th>
                        <th>Заголовок</th>
                        <th>Текст</th>
                        <th>Цена</th>
                        <th>Имя</th>
                        <th>Телефон</th>
                        <th>E-mail</th>
                        <th>Подачи</th>
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
                        <td colspan="8">
                            <i class="far fa-frown"></i>&nbsp;Нет обьявлений
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

    {{--<div class="adv-search-explain">--}}
    {{--<h3>--}}
    {{--Заполните необходимые поля и нажмите кнопку "ИСКАТЬ"--}}
    {{--</h3>--}}
    {{--<h3>--}}
    {{--Нажмите на <i class="fas fa-bars"></i> для отображения списка категорий--}}
    {{--</h3>--}}
    {{--</div>--}}

    @include('partials.advert.right_slide_menu')

@endsection