<?php
Route::get('/posts', 'PostsController@index')->name('posts.index');
Route::get('/posts/criar', 'PostsController@create')->name('posts.create');