<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::auth();

Route::get('/home', 'HomeController@index');
Route::get('/user/all/role/{id}', 'AdminController@getUserByRole');
Route::get('/user/edit/{id}', 'AdminController@edit')->name('user.edit');
Route::put('/user/update/{id}', 'AdminController@update')->name('user.update');

Route::get('/nilai/siswa', 'NilaiController@getNilai');
Route::get('/nilai/tambah/{id}', 'NilaiController@addNilai')->name('add.nilai');
Route::post('/nilai/submit', 'NilaiController@submitNilai');
Route::get('/nilai/siswa/all', 'NilaiController@getAllNilai')->name('nilai.all');