<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">

  <link rel=icon href="{{ url('/') }}/images/logo.png" sizes="any" type="image/svg+xml">

  <title>@yield('title')</title>
  @include('layouts.head')
</head>
<body>

  <div id="app">
    @yield('content')
  </div>
</body>
@include('layouts.footer')
</html>
@section("scripts")