<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

/*
|--------------------------------------------------------------------------
| FRONT SIDE
|--------------------------------------------------------------------------
*/
// Главная страница
Route::get('/', 'IndexController@index')->name('index');

// Стандартная авторизация, регистрация
Auth::routes(['verify' => true]);

// Домашняя страница пользователя
Route::group(['prefix' => 'home'], function () {
  // Личный кабинет пользователя
  Route::get('/', 'HomeController@index')->name('home');
  // Добавление времени
  Route::post('/set_time', 'HomeController@setTime')->name('set-time');
  // Печать счета
  Route::get('/home/print_acc/{id}', 'HomeController@print_acc')->name('home.print_acc');
  // Печать акта
  Route::get('/home/print_act/{id}', 'HomeController@print_act')->name('home.print_act');
});

// Страница отказа в доступе
Route::get('/no-access', function () {
  return view('noaccess');
});

// Страницы обьявлений
Route::group(['prefix' => 'advert', 'middleware' => ['auth', 'verified', 'user-has-time']], function () {
  Route::get('/', 'AdvertController@index')->name('advert-index');
  Route::get('section/{section_id}/type/{type_id}', 'AdvertController@page')->name('advert-page');
  Route::get('section/{section_id}/type/{type_id}/search', 'AdvertController@search')->name('advert-search');
  Route::get('ajax-search', 'AdvertController@ajax_search');
});

// Страницы газет
Route::group(['prefix' => 'paper', 'middleware' => ['auth', 'verified', 'user-has-time']], function () {
  Route::get('/', 'PaperController@index')->name('paper-index');
  Route::get('/search', 'PaperController@search')->name('paper-search');
  Route::get('/show/{id}', 'PaperController@show')->name('paper-show');
});

// Страницы покупки ключа
Route::group(['prefix' => 'payment'], function () {
  Route::get('/', 'PaymentController@index')->name('payment-index');
  Route::get('/confirm', 'PaymentController@confirm')->name('payment-confirm')->middleware('auth', 'verified');
  Route::post('/bill', 'PaymentController@bill')->name('payment-bill');
  Route::post('/result', 'PaymentController@result')->name('payment-result');
  Route::post('/success', 'PaymentController@success')->name('payment-success');
  Route::post('/fail', 'PaymentController@fail')->name('payment-fail');
});


// Страница защиты персональных данных
Route::get('/personal-information', function () {
  return view('personal-information');
})->name('personal-info');

// Страница защиты персональных данных
Route::get('/rules', function () {
  return view('rules');
})->name('rules');

/*
|--------------------------------------------------------------------------
| BACK SIDE
|--------------------------------------------------------------------------
*/
// Админка сайта
Route::group(['prefix' => 'admin', 'namespace' => 'Admin', 'middleware' => ['auth', 'role:admin|designer',]], function () {

  // Главная страница - Dashboard
  Route::get('/', 'DashboardController@dashboard')->name('admin.index');

  // Тарифы - Rates
  Route::resource('/rate', 'RateController', ['as' => 'admin']);

  // Проекты - Projects
  Route::resource('/project', 'ProjectController', ['as' => 'admin']);

  // Загрузка ПДФ газет - PDF
  Route::resource('/pdf', 'PdfController', ['as' => 'admin']);

  // Способы оплаты - Payment Methods
  Route::resource('/payment-methods', 'PaymentMethodsController', ['as' => 'admin']);
  Route::post('/payment-methods/active-on', 'PaymentMethodsController@activeOn')->name('admin.payment-methods.active-on');
  Route::post('/payment-methods/active-off', 'PaymentMethodsController@activeOff')->name('admin.payment-methods.active-off');
  Route::post('/payment-methods/upload-image', 'PaymentMethodsController@uploadImage')->name('admin.payment-methods.upload-image');

  // Ключи - Keys
  Route::resource('/key', 'KeyController', ['as' => 'admin']);

  // Счета\Акты - Accounts
  Route::get('/accounts', 'AccountController@index')->name('admin.accounts.index');
  Route::patch('/accounts/activate/{id}', 'AccountController@activate')->name('admin.accounts.activate');
  Route::patch('/accounts/cancel/{id}', 'AccountController@cancelled')->name('admin.accounts.cancelled');
  Route::get('/accounts/print_acc/{id}', 'AccountController@print_acc')->name('admin.accounts.print_acc');
  Route::get('/accounts/print_act/{id}', 'AccountController@print_act')->name('admin.accounts.print_act');
  Route::get('/accounts/search', 'AccountController@search')->name('admin.accounts.search');

  // Пользователи - Users
  Route::resource('/user', 'UserController', ['as' => 'admin']);
  Route::patch('/user/verified_email/{user_id}', 'UserController@verifiedEmail')->name('admin.user.verified-email');

  // Импорт обьявлений - Csfd import
  Route::get('/csfd', 'CsfdController@index')->name('admin-csfd-index');
  Route::patch('/csfd/add', 'CsfdController@add')->name('admin-csfd-add');

  // Список обьявлений - Advert table list
  Route::get('/advert', 'AdvertController@index')->name('admin-advert');

  // Роли - Roles
  Route::resource('/roles', 'RoleController', ['as' => 'admin']);
});
