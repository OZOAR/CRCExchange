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

Route::get('/', 'HomeController@index')->name('index');

$this->get('locale/reset', 'LocalizationController')->name('locale.reset');

Auth::routes();

$this->post('do/payment', 'PaymentController@pay')->name('payment.submit');

// dashboard routes
Route::group(['middleware' => ['auth']], function () {
    Route::get('/profile', 'HomeController@profile')->name('profile.index');
});

Route::get('/register/confirmation/{token}', 'Auth\RegisterController@confirm')
    ->name('auth.register.confirm');
