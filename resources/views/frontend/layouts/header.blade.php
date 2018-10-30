<?php 
use App\Http\Controllers\SiteController;
use App\Http\Controllers\FrontendController as Frontend;
$site = SiteController::get();
?>
<!DOCTYPE html>
<html>


<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>{{ $site->title }} @if( isset($page->name)) - {{ $page->name }} @endif</title>

  <meta name="csrf-token" content="{{ csrf_token() }}">
  <!-- laravel mix -->
  <link href="{{asset('css/app.css')}}" rel="stylesheet" type="text/css">
  <link href="{{asset('frontend/css/frontend.css')}}" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700,300italic,400italic,700italic" rel="stylesheet" type="text/css">
  <!-- laravel mix -->


</head>

<body>
  @if(Auth::check())
  @include("frontend.layouts.navAuth")
  @endif
  <!-- Navigation -->
  <nav class="navbar navbar-light bg-light static-top">
    <div class="container">
      <a class="navbar-brand" href="/">{{ $site->title }}</a>
      <nav class="my-2 my-md-0 mr-md-3">
        @foreach(Frontend::menus() as $menu)
          <a class="p-2 text-dark" href="{{ $menu->route }}">{{ $menu->name }}</a>
        @endforeach
      </nav>
    </div>
  </nav>