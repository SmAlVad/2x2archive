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

Auth::routes();

// Admin route
Route::group(['prefix' => 'admin', 'namespace' => 'Admin', 'middleware' => ['auth']], function (){

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
});


Route::get('/home', 'HomeController@index')->name('home');
