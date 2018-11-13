<?php
    use marcusvbda\menu\Menu;
?>
<div class="nav-wrapper">
    <h6 class="main-sidebar__nav-title">Infomativo</h6>
    <ul class="nav flex-column">
        <li class="nav-item">
            <a class="nav-link {{Menu::active("dashboard")}}" href="{{ route('dashboard') }}">
                <i class="fas fa-tachometer-alt"></i>
                <span>Dashboard</span>
            </a>
        </li>
    </ul>
    <h6 class="main-sidebar__nav-title">Cadastros</h6>
    <ul class="nav flex-column">
        <li class="nav-item">
            <a class="nav-link {{Menu::active("usuarios")}}" href="{{ route('usuarios.index') }}">
                <i class="fas fa-users"></i>
                <span>Usuários</span>
            </a>
        </li>
    </ul>
    <h6 class="main-sidebar__nav-title">Blog</h6>
    <ul class="nav flex-column">
        <li class="nav-item">
            <a class="nav-link {{Menu::active("posts")}}" href="{{ route('posts.index') }}">
                <i class="material-icons">note_add</i>
                <span>Postagens</span>
            </a>
        </li>
    </ul>
    <h6 class="main-sidebar__nav-title">Template</h6>
    <ul class="nav flex-column">

        <li class="nav-item">
            <a class="nav-link {{Menu::active("paginas")}}" href="{{ route('paginas.index') }}">
                <i class="fas fa-bolt"></i>
                <span>Páginas do site</span>
            </a>
        </li>

        <li class="nav-item">
            <a class="nav-link {{Menu::active("site")}}" href="{{ route('site.index') }}">
                <i class="material-icons">edit</i>
                <span>Edição do site</span>
            </a>
        </li>

    </ul>
</div>
