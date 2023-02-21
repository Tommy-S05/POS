<nav class="sidebar sidebar-offcanvas" id="sidebar">
    <ul class="nav">
        <li class="nav-item nav-profile">
            <div class="nav-link">
                <div class="profile-image">
                    <img src="Melody/images/faces/face5.jpg" alt="image"/>
                </div>
                <div class="profile-name">
                    <p class="name">
                        Welcome Jane
                    </p>
                    <p class="designation">
                        Super Admin
                    </p>
                </div>
            </div>
        </li>

        <li class="nav-item">
            <a class="nav-link" href="{{ route('home') }}">
                <i class="fa fa-home menu-icon"></i>
                <span class="menu-title">Dashboard</span>
            </a>
        </li>

        <li class="nav-item">
            <a class="nav-link" href="{{ route('categories.index') }}">
{{--                <i class="fa fa-puzzle-piece menu-icon"></i>--}}
                <i class="fa-solid fa-tags menu-icon"></i>
                <span class="menu-title">Categorías</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('clients.index') }}">
                <i class="fa-solid fa-users menu-icon"></i>
                <span class="menu-title">Clientes</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('products.index') }}">
                <i class="fa-solid fa-boxes-stacked menu-icon"></i>
                <span class="menu-title">Productos</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('providers.index') }}">
                <i class="fa-solid fa-truck-fast menu-icon"></i>
                <span class="menu-title">Proveedores</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('purchases.index') }}">
                <i class="fa-solid fa-cart-plus menu-icon"></i>
                <span class="menu-title">Compras</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('sales.index') }}">
                <i class="fa-solid fa-cart-shopping menu-icon"></i>
                <span class="menu-title">Ventas</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#page-layouts" aria-expanded="false" aria-controls="page-layouts">
                <i class="fa-solid fa-chart-column menu-icon"></i>
                <span class="menu-title">Reportes</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="page-layouts">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item d-none d-lg-block"> <a class="nav-link" href="{{ route('reports.day') }}">Reportes por Día</a></li>
                    <li class="nav-item d-none d-lg-block"> <a class="nav-link" href="{{ route('reports.date') }}">Reportes por Fecha</a></li>
                </ul>
            </div>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('users.index') }}">
                <i class="fa-solid fa-user-tag menu-icon"></i>
                <span class="menu-title">Usuarios</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('roles.index') }}">
                <i class="fa-solid fa-user-gear menu-icon"></i>
                <span class="menu-title">Roles</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#page-layouts2" aria-expanded="false" aria-controls="page-layouts">
                <i class="fa-solid fa-gears menu-icon"></i>
                <span class="menu-title">Configuración</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="page-layouts2">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item d-none d-lg-block"> <a class="nav-link" href="{{ route('businesses.index') }}">Empresa</a></li>
                    <li class="nav-item d-none d-lg-block"> <a class="nav-link" href="{{ route('printers.index') }}">Impresoras</a></li>
                </ul>
            </div>
        </li>

{{--        <li class="nav-item">--}}
{{--            <a class="nav-link" data-toggle="collapse" href="#page-layouts" aria-expanded="false" aria-controls="page-layouts">--}}
{{--                <i class="fab fa-trello menu-icon"></i>--}}
{{--                <span class="menu-title">Page Layouts</span>--}}
{{--                <i class="menu-arrow"></i>--}}
{{--            </a>--}}
{{--            <div class="collapse" id="page-layouts">--}}
{{--                <ul class="nav flex-column sub-menu">--}}
{{--                    <li class="nav-item d-none d-lg-block"> <a class="nav-link" href="{{ route('products.index') }}">Products</a></li>--}}
{{--                    <li class="nav-item"> <a class="nav-link" href="Melody/pages/layout/rtl-layout.html">RTL</a></li>--}}
{{--                    <li class="nav-item d-none d-lg-block"> <a class="nav-link" href="Melody/pages/layout/horizontal-menu.html">Horizontal Menu</a></li>--}}
{{--                </ul>--}}
{{--            </div>--}}
{{--        </li>--}}
{{----}}
{{--        <li class="nav-item">--}}
{{--            <a class="nav-link" href="Melody/pages/documentation.html">--}}
{{--                <i class="far fa-file-alt menu-icon"></i>--}}
{{--                <span class="menu-title">Documentation</span>--}}
{{--            </a>--}}
{{--        </li>--}}
    </ul>
</nav>
