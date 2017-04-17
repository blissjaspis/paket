<?php

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index');

Route::group(['middleware' => 'role:administrator'], function () {
    Route::name('paket.create')->get('/paket/create', 'PaketController@create');
    Route::name('paket.edit')->get('/paket/{paket}/edit', 'PaketController@edit');
    Route::resource('/user', 'UserController');
    Route::resource('/kota', 'KotaController', ['parameters' => ['kota' => 'kota']]);
});

Route::name('laporan.paket')->get('/laporan/paket/{paket}', 'LaporanController@paket');
Route::resource('/laporan', 'LaporanController');
Route::resource('/paket', 'PaketController', ['except' => ['create', 'edit']]);
