<?php
Route::group(['prefix' => 'usuarios'], function () 
{
	Route::get('', 'UsersController@index')->name('usuarios.index');
});