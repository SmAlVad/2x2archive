<div class="container-fluid" id="header">

    <div class="row">
        {{-- Логотип --}}
        <div class="col-xl-2">
            <div class="navbar-brand">
                <a href="{{ url('/') }}">
                    {{ config('app.name') }}
                </a>
            </div>
        </div>

        {{-- Навигация главная --}}
        <div class="col-xl-8">
            @include('partials.header.nav')
        </div>

        {{-- Авторизация\Регистрация --}}
        <div class="col-xl-2">
            @include('partials.header.auth')
        </div>
    </div>



</div>
