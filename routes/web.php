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

Route::get('/', function () {
    return view('welcome');
});

$this->get('locale/reset', 'LocalizationController')->name('locale.reset');

Auth::routes();

Route::get('/profile', 'HomeController@index')->name('profile.index');
Route::get('/register/confirmation/{token}', 'Auth\RegisterController@confirm')
    ->name('auth.register.confirm');
