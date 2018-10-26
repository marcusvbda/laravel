<?php
  

Route::get('/phpinfo',function()
{
  phpinfo();
});

Route::get('/testes', 'TesteController@index')->name('testes.index');
Route::post('/uploadTeste', 'TesteController@uploadImage')->name('testes.upload');

Route::group(['prefix' => 'admin'], function () 
{
  require("partials/auth.php");
  Route::group(['middleware' => 'auth'], function()
  {
      require("partials/site.php");
      Route::get('/', function () 
      {
          return view('backend.pages.dashboard.index');
      })->name("dashboard");
      require("partials/paginas.php");
  });
});

require("partials/frontend.php");
