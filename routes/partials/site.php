<?php
Route::group(['prefix' => 'site'], function () 
{
	Route::get('', 'SiteController@index')->name('site.index');
	Route::put('{site}/edit', 'SiteController@edit')->middleware(['bindings'])->name('site.edit');
});