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

Route::get('login', 'LoginController@showLogin')->name('login');
Route::post('login', 'LoginController@doLogin');

Route::middleware(['auth'])->group(function () {
    Route::get('/', 'DashboardController@index');

    //kelola
    Route::resource('pengguna', 'UserController');

    Route::get('logout', 'LoginController@doLogout');
});