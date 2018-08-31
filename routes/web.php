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

// dashboard routes
Route::group(['prefix' => '/dashboard', 'middleware' => ['admin']], function () {
    $this->get('/', 'Dashboard\DashboardController')->name('dashboard.index');
});

Auth::routes();

$this->post('do/payment', 'PaymentController@pay')->name('payment.submit');

// dashboard routes
Route::group(['prefix' => '/profile', 'middleware' => ['auth']], function () {
    Route::get('/', 'ProfileController@showProfile')->name('profile.index');
    Route::post('/settings/btc/update', 'ProfileController@updateBtcAddress')->name('profile.btc.update');
});

Route::get('/register/confirmation/{token}', 'Auth\RegisterController@confirm')
    ->name('auth.register.confirm');
