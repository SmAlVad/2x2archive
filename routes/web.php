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

// Index route
Route::get('/', 'IndexController@index')->name('index');

// No access
Route::get('/no-access', function () {
    return view('noaccess');
});

Auth::routes();

// Admin route
Route::group(['prefix' => 'admin', 'namespace' => 'Admin', 'middleware' => ['auth', 'role:admin|manager',]], function (){

    // Dashboard
    Route::get('/', 'DashboardController@dashboard')->name('admin.index');

    // Rates
    Route::resource('/rate', 'RateController', ['as' => 'admin']);

    // Payment Methods
    Route::resource('/payment-methods', 'PaymentMethodsController', ['as' => 'admin']);
    Route::post('/payment-methods/active-on', 'PaymentMethodsController@activeOn')->name('admin.payment-methods.active-on');
    Route::post('/payment-methods/active-off', 'PaymentMethodsController@activeOff')->name('admin.payment-methods.active-off');
    Route::post('/payment-methods/upload-image', 'PaymentMethodsController@uploadImage')->name('admin.payment-methods.upload-image');

    // Keys
    Route::resource('/key', 'KeyController',['as' => 'admin']);

    // Users
    Route::resource('/user', 'UserController', ['as' => 'admin']);

    // Csfd import
    Route::get('/csfd', 'CsfdController@index')->name('admin-csfd-index');
    Route::patch('/csfd/add', 'CsfdController@add')->name('admin-csfd-add');

    // Advert table list
    Route::get('/advert', 'AdvertController@index')->name('admin-advert');

    // Roles
    Route::resource('/roles','RoleController', ['as' => 'admin']);
});


Route::get('/home', 'HomeController@index')->name('home');
