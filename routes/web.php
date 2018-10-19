<?php
Route::get('/',function(){
  return redirect('admin/login');
  // echo "frontend";
});

Route::get('/testes', 'TesteController@index')->name('testes.index');
Route::post('/uploadTeste', 'TesteController@uploadImage')->name('testes.upload');

Route::group(['prefix' => 'admin'], function () 
{
  require("partials/auth.php");
  Route::group(['middleware' => 'auth'], function()
  {
      Route::get('/', function () 
      {
          return view('pages.dashboard.index');
      })->name("dashboard");
      require("partials/paginas.php");
  });
});