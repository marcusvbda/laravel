<?php
Route::get('/paginas', 'PagesController@index')->name('paginas.index');
Route::get('/paginas/criar', 'PagesController@create')->name('paginas.create');
Route::post('/paginas/criar', 'PagesController@store')->name('paginas.store');
Route::get('/paginas/{page}', 'PagesController@show')->middleware(['slugids:page,App\Models\Page', 'bindings'])->name('paginas.show');
Route::delete('/paginas/desativar/{page}', 'PagesController@destroy')->middleware(['slugids:page,App\Models\Page', 'bindings'])->name('paginas.deactivate');
Route::put('/paginas/{page}', 'PagesController@update')->middleware(['slugids:page,App\Models\Page', 'bindings'])->name('paginas.update');
