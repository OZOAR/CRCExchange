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
Route::group(['prefix' => '/dashboard', 'middleware' => ['auth.access:admin']], function () {
    $this->get('/', 'Dashboard\DashboardController')->name('dashboard.index');
    $this->get('/transactions', 'Dashboard\TransactionController@showTransactionsListPage')
        ->name('dashboard.transactions.index');
});

Auth::routes();

$this->post('do/payment', 'PaymentController@pay')->name('payment.submit');

// dashboard routes
Route::group(['prefix' => '/profile', 'middleware' => ['auth.access:partner']], function () {
    Route::get('/', 'Profile\ProfileController@showProfile')->name('profile.index');

    Route::get('/transactions', 'Profile\TransactionController@showTransactionsListPage')
        ->name('profile.transactions.index');
    Route::get('/requests', 'Profile\RMRequestController@showRequestsListPage')
        ->name('profile.requests.index');

    Route::post('/settings/btc/update', 'Profile\ProfileController@updateBtcAddress')
        ->name('profile.btc.update');
    Route::post('/receive-money/request', 'Profile\ProfileController@sendReceiveMoneyRequest')
        ->name('profile.receive_money.request');
});

Route::get('/register/confirmation/{token}', 'Auth\RegisterController@confirm')
    ->name('auth.register.confirm');
