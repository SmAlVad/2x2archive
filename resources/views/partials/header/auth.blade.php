<!-- Authentication Links -->
<ul class="auth-menu">
    @guest
        <li class="auth-item">
            <a class="auth-btn" href="{{ route('login') }}"><i class="fas fa-sign-in-alt"></i>&nbsp;{{ __('Войти') }}</a>
        </li>
        @if (Route::has('register'))
            <li class="auth-item">
                <a class="auth-btn" href="{{ route('register') }}"><i class="fas fa-user-edit"></i>&nbsp;{{ __('Регистрация') }}</a>
            </li>
        @endif
    @else
        <li class="auth-item">
            <a class="auth-btn" href="#">
                {{ Auth::user()->name }}&nbsp;<i class="fas fa-sort-down"></i>
            </a>

            <div class="auth-dropdown">
                @if(Auth::user()->hasRole('admin'))
                    <a href="{{ route('admin.index') }}" class="auth-dropdown-item">Админка</a>
                @endif
                <a href="{{ route('home') }}" class="auth-dropdown-item">Домашняя страница</a>
                <a class="auth-dropdown-item" href="{{ route('logout') }}"
                   onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                    <i class="fas fa-sign-out-alt"></i>&nbsp;{{ __('Выйти') }}
                </a>

                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
            </div>
        </li>
    @endguest
</ul>
