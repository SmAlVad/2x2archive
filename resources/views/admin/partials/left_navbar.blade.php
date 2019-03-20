<div class="admin-navigation">
    <ul class="nav flex-column">
        @can('role-list')
            <li class="nav-item">
                <a class="nav-link active" href="{{ route('admin.rate.index') }}">Тарифы</a>
            </li>
            <li class="nav-item">
                <a class="nav-link active" href="{{ route('admin.project.index') }}">Проекты</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('admin.payment-methods.index') }}">Способы оплаты</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('admin-csfd-index') }}">Загрузить обьявления</a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="{{ route('admin-advert') }}">Список обьявлений</a>
            </li>
        @endcan

        @can('pdf-list')
            <li class="nav-item">
                <a class="nav-link active" href="{{ route('admin.pdf.index') }}">PDF</a>
            </li>
        @endcan

        @can('key-list')
            <li class="nav-item">
                <a class="nav-link" href="{{ route('admin.key.index') }}">Ключи</a>
            </li>
        @endcan

        @can('user-list')
            <li class="nav-item">
                <a class="nav-link" href="{{ route('admin.user.index') }}">Пользователи</a>
            </li>
        @endcan

        @can('account-list')
            <li class="nav-item">
                <a class="nav-link" href="{{ route('admin.accounts.index') }}">Счета</a>
            </li>
        @endcan

        @can('role-list')
            <li class="nav-item">
                <a class="nav-link" href="{{ route('admin.roles.index') }}">Роли</a>
            </li>
        @endcan
    </ul>
</div>
