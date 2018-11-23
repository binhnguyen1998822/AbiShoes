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

Auth::routes();
Route::get('/', function () {
    return redirect('home');
});
Route::get('/home', 'HomeController@index')->name('home');
Route::get('hoadon', 'HoadonController@index')->name('hoadon');
Route::post('hoadon', 'HoadonController@add')->name('hoadon');

Route::get('/logout', function () {
    Auth::logout();
    return redirect('home');
});
