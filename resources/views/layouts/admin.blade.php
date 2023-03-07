@php
    use Illuminate\Support\Facades\Route;
@endphp
<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}"  class="no-js no-svg">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
    <link rel="shortcut icon" href="images/favicon.ico" type="image/x-icon">
    <!-- responsive meta -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- For IE -->
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Laravel') }}</title>
{{--    <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" />--}}
    <link href="{{ asset('assets/admin/css/datatables.css')}}" rel="stylesheet" />
    <link href="{{ asset('assets/admin/css/styles.css')}}" rel="stylesheet" />
    <link rel='stylesheet' href="{{asset('css/dropify.min.css')}}" type="text/css" />
    <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
    @stack('css')
</head>
<body class="sb-nav-fixed">
<nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
    <!-- Navbar Brand-->
    <a class="navbar-brand ps-3" href="{{route('admin')}}">{{ config('app.name', 'Laravel') }}</a>
    <!-- Sidebar Toggle-->
    <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i class="fas fa-bars"></i></button>
    <!-- Navbar Search-->
    <form class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0">
{{--        <div class="input-group">--}}
{{--            <input class="form-control" type="text" placeholder="Search for..." aria-label="Search for..." aria-describedby="btnNavbarSearch" />--}}
{{--            <button class="btn btn-primary" id="btnNavbarSearch" type="button"><i class="fas fa-search"></i></button>--}}
{{--        </div>--}}
    </form>
    <!-- Navbar-->
    <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
{{--                <li><a class="dropdown-item" href="#!">Settings</a></li>--}}
{{--                <li><a class="dropdown-item" href="#!">Activity Log</a></li>--}}
{{--                <li><hr class="dropdown-divider" /></li>--}}
                <li><a class="dropdown-item"
                       href="{{ route('logout') }}"
                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();" >Logout</a></li>

                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                </form>
            </ul>
        </li>
    </ul>
</nav>
<div id="layoutSidenav">
    <div id="layoutSidenav_nav">
        <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
            <div class="sb-sidenav-menu">
                <div class="nav">
                    <a class="nav-link {{Route::currentRouteName() == 'admin.dashboard' ? 'active':''}} " href="{{route('admin.dashboard')}}">
                        <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                        Dashboard
                    </a>
                    <a class="nav-link {{Route::currentRouteName() == 'admin.settings.site' ? 'active':''}} " href="{{route('admin.settings.site')}}">
                        <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                        Site Setting
                    </a>
                    <a class="nav-link {{str_contains(Route::currentRouteName(),'admin.settings.slider') ? 'active':''}}" href="{{route('admin.settings.slider')}}">
                        <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                        Slider
                    </a>
                    <a class="nav-link {{str_contains(Route::currentRouteName(),'admin.obituary') ? 'active':''}}" href="{{route('admin.obituaries')}}">
                        <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                        Obituaries
                    </a>
                    <a class="nav-link {{Route::currentRouteName() == 'admin.subscriptions' ? 'active':''}}" href="{{route('admin.subscriptions')}}">
                        <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                        Subscriptions
                    </a>
                    <a class="nav-link {{Route::currentRouteName() == 'admin.users' ? 'active':''}}" href="{{route('admin.users')}}">
                        <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                        Users
                    </a>
                    <a class="nav-link {{str_contains(Route::currentRouteName(),'admin.contributor') ? 'active':''}}" href="{{route('admin.contributors')}}">
                        <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                        Contributors
                    </a>
                    <a class="nav-link {{str_contains(Route::currentRouteName(),'admin.payments')  ? 'active':''}}" href="{{route('admin.payments')}}">
                        <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                        Payments
                    </a>
                </div>
            </div>
            <div class="sb-sidenav-footer">
                <div class="small">Logged in as: <strong>Admin</strong></div>
            </div>
        </nav>
    </div>
    <div id="layoutSidenav_content">
        <main>
            <div class="container-fluid px-4">
                @if ($message = Session::get('success'))
                    <div class="alert alert-success alert-dismissible">
                        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                        <strong>{{ $message }}</strong>
                    </div>
                @endif

                @if ($message = Session::get('error'))
                    <div class="alert alert-danger alert-dismissible">
                        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                        <strong>{{ $message }}</strong>
                    </div>
                @endif

                @if ($message = Session::get('warning'))
                    <div class="alert alert-warning alert-dismissible">
                        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                        <strong>{{ $message }}</strong>
                    </div>
                @endif

                @if ($message = Session::get('info'))
                    <div class="alert alert-info alert-dismissible">
                        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                        <strong>{{ $message }}</strong>
                    </div>
                @endif

                @yield('content')
            </div>
        </main>
        <footer class="py-4 bg-light mt-auto">
            <div class="container-fluid px-4">
                <div class="d-flex align-items-center justify-content-between small">
                    <div class="text-muted">Copyright &copy; Your Website 2022</div>
                    <div>
                        <a href="#">Privacy Policy</a>
                        &middot;
                        <a href="#">Terms &amp; Conditions</a>
                    </div>
                </div>
            </div>
        </footer>
    </div>
</div>
<script src="{{ asset('js/jquery.min.js')}}"></script>
<script src="{{ asset('assets/admin/js/bootstrap.bundle.min.js')}}"></script>
<script src="{{ asset('assets/admin/js/scripts.js')}}"></script>
<script src="{{ asset('assets/admin/js/datatables.js')}}"></script>
<script src="{{ asset('assets/admin/js/datatables-simple-demo.js')}}"></script>
<script src="{{ asset('js/dropify.min.js') }}"></script>
@stack('js')
</body>
</html>
