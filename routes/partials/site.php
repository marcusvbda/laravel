<?php
Route::get('/site', 'SiteController@index')->name('site.index');
Route::post('/site/{site}/edit', 'SiteController@edit')->middleware(['bindings'])->name('site.edit');