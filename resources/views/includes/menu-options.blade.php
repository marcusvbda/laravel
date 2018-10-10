<ul class="navigation-menu">

    <li class="has-submenu">
        <a href="{{ url('/') }}">
            <i class="fa fa-tachometer-alt"></i>
            <span>Dashboard</span>
        </a>
    </li>
    @role('Admin')
    <li class="has-submenu">
        <a href="#"><i class="fa fa-chart-bar"></i>Relatórios</a>
    </li>

    <li class="has-submenu">
      <a href="#"><i class="fa fa-store"></i>Lojas</a>
      <ul class="submenu">
        <li><a href="#">Nova Loja</a></li>
        <li><a href="#">Todas</a></li>
        <li><a href="#">Desativadas</a></li>
      </ul>
    </li>
    @endrole
    @role('reseller')
    <li class="has-submenu">
        <a href="#"><i class="fa fa-store"></i>Minha Loja</a>
        <ul class="submenu">
            <li><a href="email-inbox">Produtos</a></li>
            <li><a href="email-compose">Pedidos</a></li>
            <li><a href="email-compose">Usuários</a></li>
            <li><a href="email-read">Configurações</a></li>
        </ul>
    </li>

    <li class="has-submenu">
      <a href="#"><i class="fa fa-user"></i>Pedidos</a>
      <ul class="submenu">
        <li><a href="#">Completados</a> </li>
        <li><a href="#">Pendentes</a> </li>
        <li><a href="#">Cancelados</a> </li>
      </ul>
    </li>
    @endrole
</ul>
