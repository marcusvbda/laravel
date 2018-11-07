<?php
Route::group(['prefix' => 'posts'], function () 
{
	Route::get('', 'PostsController@index')->name('posts.index');
	Route::get('criar', 'PostsController@create')->name('posts.create');
	Route::post('criar', 'PostsController@store')->name('posts.store');
	Route::get('{post}', 'PostsController@show')->middleware(['slugids:post,App\Models\Post', 'bindings'])->name('posts.show');
	Route::post('{post}', 'PostsController@update')->middleware(['slugids:post,App\Models\Post', 'bindings'])->name('posts.update');
});