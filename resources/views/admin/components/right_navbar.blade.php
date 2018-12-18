<div class="admin-navigation">
    <ul class="nav flex-column">
        <li class="nav-item">
            <a class="nav-link active" href="{{ route('admin.rate.index') }}">Тарифы</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('admin.payment-methods.index') }}">Способы оплаты</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('admin.key.index') }}">Ключи</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('admin.user.index') }}">Пользователи</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('admin-csfd-index') }}">Загрузить обьявления</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('admin-advert') }}">Список обьявлений</a>
        </li>
        @can('role-list')
            <li class="nav-item">
                <a class="nav-link" href="{{ route('admin.roles.index') }}">Роли</a>
            </li>
        @endcan
    </ul>
</div>