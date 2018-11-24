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
Route::get('home', 'HomeController@index')->name('home');
Route::get('hoadon', 'HoadonController@index')->name('hoadon');
Route::post('hoadon', 'HoadonController@add')->name('hoadon');

Route::get('tonkho', 'KhohangController@index')->name('tonkho');
Route::post('tonkho', 'KhohangController@add')->name('tonkho');
Route::post('tonkho/{id}', 'KhohangController@addslsp')->name('tonkho');
Route::get('tonkho/{id}', 'KhohangController@view')->name('tonkho');

Route::get('size', 'SizeController@index');


Route::get('/logout', function () {
    Auth::logout();
    return redirect('home');
});
