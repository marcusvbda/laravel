<?php
Route::group(['prefix' => 'categorias'], function () 
{
	Route::post('criar', 'CategoriesController@store')->name('categorias.store');
});