@extends('layouts.app')

@section('content')

    <div class="adv-search-panel">

        @include('partials.advert.search')

        <div id="right-slide-menu-btn"><i class="fas fa-bars"></i></div>

    </div>

    {{--Result--}}
    <div class="adv-search-result">

        @isset($adverts)
            @forelse($adverts as $advert)
                {{ $advert->body }}
            @empty
                <i class="far fa-frown"></i>&nbsp;Нет обьявлений
            @endforelse

            {{$adverts->links()}}
        @endisset
    </div>

    <div class="adv-search-explain">
        <h3>
            Заполните необходимые поля и нажмите кнопку "ИСКАТЬ"
        </h3>
        <h3>
            Нажмите на <i class="fas fa-bars"></i> для отображения списка категорий
        </h3>
    </div>

    @include('partials.advert.right_slide_menu')

@endsection