<?php

// https://github.com/davejamesmiller/laravel-breadcrumbs

// Главная
Breadcrumbs::for('index', function ($trail) {
    $trail->push('Главная', route('index'));
});

// Главная > Купить ключ
Breadcrumbs::for('buy-key', function ($trail) {
    $trail->parent('index');
    $trail->push('Купить ключ', route('payment-index'));
});

// Главная > Купить ключ > Подтверждение
Breadcrumbs::for('payment-confirm', function ($trail) {
    $trail->parent('buy-key');
    $trail->push('Купить ключ', route('payment-confirm'));
});

// Главная > Обьявления
Breadcrumbs::for('advert', function ($trail) {
    $trail->parent('index');
    $trail->push('Обьявления', route('advert-index'));
});

// Главная > Обьявления > Поиск
Breadcrumbs::for('advert-page', function ($trail) {
    $trail->parent('advert');
    $trail->push('Поиск', route('advert-page'));
});
