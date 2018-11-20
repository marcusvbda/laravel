<?php

Route::group(['prefix' => 'usuarios'], function () {
    Route::get('', 'UsersController@index')->name('usuarios.index');
    Route::get('{user}', 'UsersController@show')->middleware(['hashids:user', 'bindings'])->name('usuarios.show');
    Route::put('{user}', 'UsersController@edit')->middleware(['hashids:user', 'bindings'])->name('usuarios.edit');
    Route::post('{user}', 'UsersController@profileUpload')->middleware(['hashids:user', 'bindings'])->name('usuarios.upload');
});
