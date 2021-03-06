<?php
use App\Http\Controllers\SiteController;
$site = SiteController::get();
?>

@extends('backend.layouts.empty')

@section('content')
<body class="h-100">
    <div class="container-fluid">
      <div class="row">
        <!-- Main Sidebar -->

            <aside class="main-sidebar col-12 col-md-3 col-lg-2 px-0">
                <div class="main-navbar">
                    <nav class="navbar align-items-stretch navbar-light bg-white flex-md-nowrap border-bottom p-0">
                        <a class="navbar-brand w-100 mr-0" href="{{ route('dashboard') }}" style="line-height: 25px;">
                            <div class="d-table m-auto">
                                <img id="main-logo" class="d-inline-block align-top mr-1" style="max-width: 25px;" src="{{ url('/') }}/images/logo.png" alt="Dashboard">
                                <span class="d-none d-md-inline ml-1">{{ $site->title }}</span>
                            </div>
                        </a>
                        <a class="toggle-sidebar d-sm-inline d-md-none d-lg-none">
                            <i class="material-icons">&#xE5C4;</i>
                        </a>
                    </nav>
                </div>
                {{-- menus --}}
                @include('backend.layouts.menu_principal')
                {{-- menus --}}
            </aside>
            <!-- End Main Sidebar -->
            <main class="main-content col-lg-10 col-md-9 col-sm-12 p-0 offset-lg-2 offset-md-3">
                <div class="main-navbar sticky-top bg-white">
                    <!-- Main Navbar -->
                    <nav class="navbar align-items-stretch navbar-light flex-md-nowrap p-0">
                        <div class="main-navbar__search w-100 d-none d-md-flex d-lg-flex"></div>
                        <ul class="navbar-nav border-left flex-row ">
                            <li class="nav-item border-right dropdown notifications">
                                <a class="nav-link nav-link-icon text-center" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <div class="nav-link-icon__wrapper">
                                        <i class="material-icons"></i>
                                        <span class="badge badge-pill badge-danger">2</span>
                                    </div>
                                </a>
                                <div class="dropdown-menu dropdown-menu-small" aria-labelledby="dropdownMenuLink">
                                    <a class="dropdown-item" href="#">
                                        <div class="notification__icon-wrapper">
                                            <div class="notification__icon">
                                                <i class="material-icons"></i>
                                            </div>
                                        </div>
                                        <div class="notification__content">
                                            <span class="notification__category">Analytics</span>
                                            <p>Your website’s active users count increased by
                                                <span class="text-success text-semibold">28%</span> in the last week. Great job!</p>
                                        </div>
                                    </a>
                                    <a class="dropdown-item" href="#">
                                        <div class="notification__icon-wrapper">
                                            <div class="notification__icon">
                                                <i class="material-icons"></i>
                                            </div>
                                        </div>
                                        <div class="notification__content">
                                        <span class="notification__category">Sales</span>
                                        <p>Last week your store’s sales count decreased by
                                            <span class="text-danger text-semibold">5.52%</span>. It could have been worse!</p>
                                        </div>
                                    </a>
                                    <a class="dropdown-item notification__all text-center" href="#"> View all Notifications </a>
                                </div>
                                </li>
                                <menu-profile 
                                    username="{{ Auth::user()->email }}"
                                    image="{{ Auth::user()->profile }}"
                                    profile_route={{ route('usuarios.show',['code'=>Auth::user()->code])  }}
                                    >
                                </menu-profile>
                            </ul>
                            <nav class="nav">
                                <a href="#" class="nav-link nav-link-icon toggle-sidebar d-md-inline d-lg-none text-center border-left" data-toggle="collapse" data-target=".header-navbar" aria-expanded="false" aria-controls="header-navbar">
                                    <i class="material-icons"></i>
                                </a>
                            </nav>
                        </nav>
                    </div>
                    @include('backend.layouts.alerts')
                    <div class="main-content-container container-fluid px-4">
                        <!-- Page Header -->
                        @yield('breadcrumb')
                        <!-- End Page Header -->
                        <!-- Small Stats Blocks -->

                        @yield('body')
                    </div>
                    <footer class="main-footer d-flex p-2 px-3 bg-white border-top">
                        <span class="copyright ml-auto my-auto mr-2">Copyright © 2018
                            <a href="#" rel="nofollow">Vinicius Bassalobre</a>
                        </span>
                    </footer>
                </main>
            </div>
        </div>
    </body>
    @endsection
    

