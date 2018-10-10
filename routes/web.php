<?php
Route::get('/',function(){
  return redirect('admin/login');
  // echo "frontend";
});

Route::group(['prefix' => 'admin'], function () 
{
  require("partials/auth.php");
  Route::group(['middleware' => 'auth'], function()
  {
      Route::get('/', function () 
      {
          return view('dashboard');
      })->name("dashboard");
      require("partials/paginas.php");
  });
});