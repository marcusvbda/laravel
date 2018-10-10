@extends('layouts.empty')

@section('breadcrumb')
@endsection

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
                        <span class="d-none d-md-inline ml-1">Shards Dashboard</span>
                    </div>
                </a>
                <a class="toggle-sidebar d-sm-inline d-md-none d-lg-none">
                    <i class="material-icons">&#xE5C4;</i>
                </a>
                </nav>
            </div>
            <form action="#" class="main-sidebar__search w-100 border-right d-sm-flex d-md-none d-lg-none">
                <div class="input-group input-group-seamless ml-3">
                <div class="input-group-prepend">
                    <div class="input-group-text">
                    <i class="fas fa-search"></i>
                    </div>
                </div>
                <input class="navbar-search form-control" type="text" placeholder="Procurando algo ?" aria-label="Search"> </div>
            </form>
            <div class="nav-wrapper">
                <h6 class="main-sidebar__nav-title">Infomativo</h6>
                <ul class="nav flex-column">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('dashboard') }}" id="menuDashboard">
                        <i class="fas fa-tachometer-alt"></i>
                        <span>Dashboard</span>
                        </a>
                    </li>
                </ul>
                <h6 class="main-sidebar__nav-title">Template</h6>
                <ul class="nav flex-column">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('paginas.index') }}" id="menuPaginas">
                        <i class="fas fa-bolt"></i>
                        <span>Páginas do site</span>
                        </a>
                    </li>
                </ul>
            </div>
            </aside>
        
        <!-- End Main Sidebar -->
        <main class="main-content col-lg-10 col-md-9 col-sm-12 p-0 offset-lg-2 offset-md-3">
            <div class="main-navbar sticky-top bg-white">
                <!-- Main Navbar -->
                <nav class="navbar align-items-stretch navbar-light flex-md-nowrap p-0">
                <form action="#" class="main-navbar__search w-100 d-none d-md-flex d-lg-flex">
                    <div class="input-group input-group-seamless ml-3">
                    <div class="input-group-prepend">
                        <div class="input-group-text">
                        <i class="fas fa-search"></i>
                        </div>
                    </div>
                    <input class="navbar-search form-control" type="text" placeholder="Procurando por alguma coisa ?" aria-label="Search"> </div>
                </form>
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
                    <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle text-nowrap px-3" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
                        <img class="user-avatar rounded-circle mr-2" src="http://127.0.0.1:8000/images/avatars/0.jpg" alt="User Avatar">
                        <span class="d-none d-md-inline-block">Sierra Brooks</span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-small">
                        <a class="dropdown-item" href="user-profile-lite.html">
                        <i class="material-icons"></i> Profile</a>
                        <a class="dropdown-item" href="components-blog-posts.html">
                        <i class="material-icons">vertical_split</i> Blog Posts</a>
                        <a class="dropdown-item" href="add-new-post.html">
                        <i class="material-icons">note_add</i> Add New Post</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item text-danger" href="#" data-toggle="modal" data-target="#logoutModal">
                        <i class="material-icons text-danger"></i> Logout </a>
                    </div>
                    </li>
                </ul>
                <nav class="nav">
                    <a href="#" class="nav-link nav-link-icon toggle-sidebar d-md-inline d-lg-none text-center border-left" data-toggle="collapse" data-target=".header-navbar" aria-expanded="false" aria-controls="header-navbar">
                    <i class="material-icons"></i>
                    </a>
                </nav>
                </nav>
            </div>
            @yield('messages')
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

    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Confirmação</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    Deseja mesmo sair ?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                    <a href="{{ route('logout') }}" class="btn btn-danger">Efetuar logout</a>
                </div>
            </div>
        </div>
    </div>
@endsection
