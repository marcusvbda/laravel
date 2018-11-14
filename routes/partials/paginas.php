<?php

Route::group(['prefix' => 'paginas'], function () {
    Route::get('', 'PagesController@index')->name('paginas.index');
    Route::get('criar', 'PagesController@create')->name('paginas.create');
    Route::post('criar', 'PagesController@store')->name('paginas.store');
    Route::get('{page}', 'PagesController@show')->middleware(['slugids:page,App\Models\Page', 'bindings'])->name('paginas.show');
    Route::delete('{page}/desativar', 'PagesController@destroy')->middleware(['slugids:page,App\Models\Page', 'bindings'])->name('paginas.deactivate');
    Route::put('{page}', 'PagesController@update')->middleware(['slugids:page,App\Models\Page', 'bindings'])->name('paginas.update');
});
