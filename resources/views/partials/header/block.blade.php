<div class="container-fluid" id="header">

    <div class="row">
        {{-- Логотип --}}
        <div class="col-xl-3">
            <div class="navbar-brand">

                @if(\Request::route()->getName() == 'index')
                    <img src="/image/logo_1.svg" alt="Архив газеты 2x2" height="60px">
                @else
                    <a href="{{ url('/') }}">
                        <img src="/image/logo_1.svg" alt="Архив газеты 2x2" height="60px">
                    </a>
                @endif

            </div>
        </div>

        {{-- Навигация главная --}}
        <div class="col-xl-7">
            @include('partials.header.nav')
        </div>

        {{-- Авторизация\Регистрация --}}
        <div class="col-xl-2">
            @include('partials.header.auth')
        </div>
    </div>

</div>
