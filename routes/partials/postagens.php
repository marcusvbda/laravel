<?php
Route::get('/posts', 'PostsController@index')->name('posts.index');
Route::get('/posts/criar', 'PostsController@create')->name('posts.create');
Route::post('/posts/criar', 'PostsController@store')->name('posts.store');
Route::get('/posts/{post}', 'PostsController@show')->middleware(['slugids:post,App\Models\Post', 'bindings'])->name('posts.show');
Route::post('/posts/{post}', 'PostsController@update')->middleware(['slugids:post,App\Models\Post', 'bindings'])->name('posts.update');