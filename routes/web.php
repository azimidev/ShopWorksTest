<?php

Route::view('/', 'welcome');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/', 'RotaSlotStaffController@index')->name('rota.staff');

Route::prefix('api')->group(function () {
	Route::get('rota/staff/by-day', 'RotaSlotStaffController@getStaffDataByDay')->name('api.rota.staff.by.day');
});
