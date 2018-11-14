<?php

Route::group(['prefix' => 'usuarios'], function () {
    Route::get('', 'UsersController@index')->name('usuarios.index');
    Route::get('{user}', 'UsersController@show')->middleware(['hashids:user', 'bindings'])->name('usuarios.show');
});
