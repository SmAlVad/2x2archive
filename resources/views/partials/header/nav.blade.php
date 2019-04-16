<nav class="main-nav">
    <ul class="menu">
        <li class="menu-item {{ (\Request::is('payment*')) ? 'menu-item-active' : '' }}">
            <a class="menu-btn" href="{{ route('payment-index') }}">Купить ключ</a>
        </li>
        <li class="menu-item {{ (\Request::is('advert*')) ? 'menu-item-active' : '' }}">
            <a class="menu-btn" href="{{ route('advert-index') }}">Объявления</a>
        </li>
        <li class="menu-item {{ (\Request::is('paper*')) ? 'menu-item-active' : '' }}">
            <a class="menu-btn" href="{{ route('paper-index') }}">Читать газету</a>
        </li>
    </ul>
</nav>
