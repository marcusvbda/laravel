<?php
Route::get('/site', 'SiteController@index')->name('site.index');
Route::put('/site/{site}/edit', 'SiteController@edit')->middleware(['bindings'])->name('site.edit');