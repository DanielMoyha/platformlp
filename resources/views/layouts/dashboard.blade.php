<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8" />
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <link rel="shortcut icon" href="{{ asset('img/icon.png') }}" type="image/x-icon">
    <title>EPB - @yield('titulo')</title>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    @stack('styles')

    <!-- Scripts -->

    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
</head>

<body class="sb-nav-fixed" style="background-color: #fafafc">
    {{--  <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark" style="background-color: #202942; !important">  --}}
    <nav class="sb-topnav navbar navbar-expand navbar-dark" style="background-color: #202942; !important">
        <!-- Navbar Brand-->
        <a class="navbar-brand ps-3" href="{{ route('home') }}">
            E.P.B - La Paz
        </a>

        <!-- Sidebar Toggle-->
        <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!">
            <i class="fas fa-bars"></i>
        </button>

        <!-- Navbar Search-->
        <div class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-1 my-2 my-md-0">
            {{--  <div class="input-group">
                <input class="form-control" type="text" placeholder="Buscar..." aria-label="Buscar..."
                    aria-describedby="btnNavbarSearch" />
                <button class="btn btn-primary" id="btnNavbarSearch" type="button"><i
                        class="fas fa-search"></i></button>
            </div>  --}}
            <span class="fw-bold text-muted">Bienvenido(a):</span>
        </div>

        <!-- Navbar-->
        <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button"
                    data-bs-toggle="dropdown" aria-expanded="false">{{ Auth::user()->name }}<i
                        class="fas fa-user fa-fw"></i></a>
                <ul class="dropdown-menu dropdown-menu-end text-center" aria-labelledby="navbarDropdown">
                    <li><a class="dropdown-item" href="{{ route('profile') }}"><span class="fw-bold">Ver Perfil</span> <i class="fa-solid fa-user-gear icon-info"></i></a></li>
                    {{--  <li>
                        <a class="dropdown-item" href="{{ route('cambiarContraseña') }}">
                            Cambiar Contraseña
                        </a>
                    </li>  --}}
                    <li>
                        <hr class="dropdown-divider" />
                    </li>

                    <li>
                        <a class="dropdown-item" href="{{ route('logout') }}"
                            onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();"><span class="fw-bold">Salir <i class="fa-solid fa-right-from-bracket icon-danger"></i> </span>
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </li>
                </ul>
            </li>
        </ul>
    </nav>

    <div id="layoutSidenav">
        <div id="layoutSidenav_nav">
            <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion" style="background-color: #202942; !important">
                <div class="sb-sidenav-menu">
                    <div class="nav">
                        <div class="sb-sidenav-menu-heading">Control</div>
                        <a class="nav-link" href="{{ route('home') }}">
                            <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                            Panel Administrativo
                        </a>
                        <div class="sb-sidenav-menu-heading">Usuarios</div>
                        {{--  <a class="nav-link" href="{{ route('personal') }}">
                            <div class="sb-nav-link-icon"><i class="fas fa-users"></i></div>
                            Personal
                        </a>  --}}
                        <a class="nav-link collapsed" href="#" data-bs-toggle="collapse"
                            data-bs-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts">
                            <div class="sb-nav-link-icon"><i class="fas fa-users"></i></div>
                            Personal
                            <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                        </a>
                        <div class="collapse" id="collapseLayouts" aria-labelledby="headingOne"
                            data-bs-parent="#sidenavAccordion">
                            <nav class="sb-sidenav-menu-nested nav">
                                <a class="nav-link" href="{{ route('personal') }}"><i class="fas fa-table px-2"></i> Ver lista</a>
                                {{--  <a class="nav-link" href="{{ route('personal.create') }}"><i class="fas fa-user px-2"></i> Agregar Personal</a>  --}}
                                <a class="nav-link collapsed pt-md-0" href="#" data-bs-toggle="collapse"
                                    data-bs-target="#collapseLayouts2" aria-expanded="false" aria-controls="collapseLayouts2">
                                    <div class="sb-nav-link-icon"><i class="fa-solid fa-user-plus"></i></div>
                                    Agregar Personal
                                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                                </a>

                                <div class="collapse" id="collapseLayouts2" aria-labelledby="headingOne"
                                    data-bs-parent="#sidenavAccordion2">
                                    <nav class="sb-sidenav-menu-nested nav">
                                        <a class="nav-link pt-md-0" href="{{ route('personal.create') }}"><i class="fa-solid fa-user-tie px-2"></i>Administrativos</a>
                                        <a class="nav-link pt-md-0" href="{{ route('pasante.create') }}"><i class="fa-solid fa-user-clock px-2"></i>Pasantes</a>
                                        <a class="nav-link pt-md-0" href="{{ route('voluntario.create') }}"><i class="fa-solid fa-user-gear px-2"></i>Voluntarios</a>
                                    </nav>
                                </div>
                            </nav>
                        </div>

                        <a class="nav-link collapsed" href="#" data-bs-toggle="collapse"
                            data-bs-target="#collapseCasos" aria-expanded="false" aria-controls="collapseLayouts">
                            <div class="sb-nav-link-icon"><i class="fa-solid fa-briefcase"></i></div>
                            Casos
                            <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                        </a>
                        <div class="collapse" id="collapseCasos" aria-labelledby="headingOne"
                            data-bs-parent="#sidenavAccordion">
                            <nav class="sb-sidenav-menu-nested nav">
                                <a class="nav-link" href="{{ route('home') }}"><i class="fa-solid fa-house-circle-check px-2"></i>Ver Casos</a>
                                <a class="nav-link" href="{{ route('paciente.create') }}"><i class="fa-solid fa-file-circle-plus px-2"></i></i>Registrar Nuevo Caso</a>
                                <a class="nav-link" href="{{ route('hijos') }}"><i class="fa-solid fa-clipboard-list px-2"></i></i></i>Ver Asignaciones</a>
                            </nav>
                        </div>

                        <a class="nav-link collapsed" href="#" data-bs-toggle="collapse"
                            data-bs-target="#collapseSeguimiento" aria-expanded="false" aria-controls="collapseSeguimiento">
                            <div class="sb-nav-link-icon"><i class="fa-solid fa-bars-progress"></i></div>
                            Seguimiento
                            <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                        </a>
                        <div class="collapse" id="collapseSeguimiento" aria-labelledby="headingOne"
                            data-bs-parent="#sidenavAccordion">
                            <nav class="sb-sidenav-menu-nested nav">
                                <a class="nav-link" href="{{ route('seguimiento.sesiones') }}"><i class="fa-solid fa-id-card px-2"></i> Sesiones</a>
                            </nav>
                        </div>

                        {{--  <a class="nav-link collapsed" href="#" data-bs-toggle="collapse"
                            data-bs-target="#collapsePages" aria-expanded="false" aria-controls="collapsePages">
                            <div class="sb-nav-link-icon"><i class="fas fa-book-open"></i></div>
                            Pages
                            <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                        </a>
                        <div class="collapse" id="collapsePages" aria-labelledby="headingTwo"
                            data-bs-parent="#sidenavAccordion">
                            <nav class="sb-sidenav-menu-nested nav accordion" id="sidenavAccordionPages">
                                <a class="nav-link collapsed" href="#" data-bs-toggle="collapse"
                                    data-bs-target="#pagesCollapseAuth" aria-expanded="false"
                                    aria-controls="pagesCollapseAuth">
                                    Authentication
                                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                                </a>
                                <div class="collapse" id="pagesCollapseAuth" aria-labelledby="headingOne"
                                    data-bs-parent="#sidenavAccordionPages">
                                    <nav class="sb-sidenav-menu-nested nav">
                                        <a class="nav-link" href="login.html">Login</a>
                                        <a class="nav-link" href="register.html">Register</a>
                                        <a class="nav-link" href="password.html">Forgot Password</a>
                                    </nav>
                                </div>
                                <a class="nav-link collapsed" href="#" data-bs-toggle="collapse"
                                    data-bs-target="#pagesCollapseError" aria-expanded="false"
                                    aria-controls="pagesCollapseError">
                                    Error
                                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                                </a>
                                <div class="collapse" id="pagesCollapseError" aria-labelledby="headingOne"
                                    data-bs-parent="#sidenavAccordionPages">
                                    <nav class="sb-sidenav-menu-nested nav">
                                        <a class="nav-link" href="401.html">401 Page</a>
                                        <a class="nav-link" href="404.html">404 Page</a>
                                        <a class="nav-link" href="500.html">500 Page</a>
                                    </nav>
                                </div>
                            </nav>
                        </div>  --}}
                        {{--  <div class="sb-sidenav-menu-heading">Addons</div>
                        <a class="nav-link" href="tables.html">
                            <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                            Tables
                        </a>  --}}
                    </div>
                </div>
                <div class="sb-sidenav-footer" style="background-color: #202942; !important">
                    <div class="small fst-italic">Conectado como:</div>
                    {{ auth()->user()->role->name }}
                </div>
            </nav>
        </div>

        <div id="layoutSidenav_content">
            <main>
                <div class="container-fluid px-4">
                    <h2 class="mt-4">@yield('titulo')</h2>
                    @yield('content')

                </div>
            </main>


            <footer class="py-4 mt-auto footer-dash">
                <div class="container-fluid px-4">
                    <div class="d-flex align-items-center justify-content-between small">
                        <div class="text-muted">Copyright &copy; EPB Filial - LA PAZ {{ now()->year }}</div>
                        {{--  <div>
                            <a href="#">Privacy Policy</a>
                            &middot;
                            <a href="#">Terms &amp; Conditions</a>
                        </div>  --}}
                    </div>
                </div>
            </footer>
        </div>
    </div>

    <!-- Scripts -->
    <script src="{{ asset('js/dashboard.js') }}" defer></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"
        integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

    {{--  <script>
        $(document).ready(function() {
            $("[list='optionsSidebar']").on("input ketdown", function() {
              window.location = $("#optionsSidebar option[value='"+$("[list='optionsSidebar']").val()+"']").find("a").attr("href")
            });
        });
    </script>  --}}
        {{--  <script>
            function manageRadioButton() {
                let radioOtrosConyugal = document.getElementById('otros-conyugal');
                radioOtrosConyugal.checked = true;
            }
        </script>  --}}
    @stack('scripts')

</body>

</html>
