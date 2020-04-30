<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <title>{{ config('app.name') }}</title>
    <!-- Favicon-->
    <link rel="icon" href="{{ asset('favicon.ico') }}" type="image/x-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,700&subset=latin,cyrillic-ext" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" type="text/css">

    <!-- Bootstrap Core Css -->
    <link href="{{ asset('plugins/bootstrap/css/bootstrap.css') }}" rel="stylesheet">

    <!-- Waves Effect Css -->
    <link href="{{ asset('plugins/node-waves/waves.css') }}" rel="stylesheet" />

    <!-- Animation Css -->
    <link href="{{ asset('plugins/animate-css/animate.css') }}" rel="stylesheet" />

    <!-- Morris Chart Css-->
    <link href="{{ asset('plugins/morrisjs/morris.css') }}" rel="stylesheet" />

    <!-- Custom Css -->
    <link href="{{ asset('css/admin/style.css') }}" rel="stylesheet">

    <!-- AdminBSB Themes. You can choose a theme from css/themes instead of get all themes -->
    <link href="{{ asset('css/admin/themes/all-themes.css') }}" rel="stylesheet" />
    @stack('styles')
</head>

<body class="theme-red">
<!-- Page Loader -->
<div class="page-loader-wrapper">
    <div class="loader">
        <div class="preloader">
            <div class="spinner-layer pl-red">
                <div class="circle-clipper left">
                    <div class="circle"></div>
                </div>
                <div class="circle-clipper right">
                    <div class="circle"></div>
                </div>
            </div>
        </div>
        <p>{{ trans('pages.please_wait') }}</p>
    </div>
</div>
<!-- #END# Page Loader -->
<!-- Overlay For Sidebars -->
<div class="overlay"></div>
<!-- #END# Search Bar -->
<!-- Top Bar -->
<nav class="navbar">
    <div class="container-fluid">
        <div class="navbar-header">
            <a href="javascript:void(0);" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse" aria-expanded="false"></a>
            <a href="javascript:void(0);" class="bars"></a>
            <a class="navbar-brand" href="{{ route('home') }}">{{ config('app.name') }}</a>
        </div>
        <div class="nav navbar-nav navbar-right" id="navbar-collapse">
            <span class="vd_navbar-right space-xs"><h5 class="title" style="color: white">{{ Auth::user()->name }}
                <form id="logout-form" action="{{ route('logout') }}" method="POST">
                                @csrf
                            <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                Sair
                            </a>
                </form>
            </span>
        </div>
    </div>
</nav>
<!-- #Top Bar -->
<section>
    <!-- Left Sidebar -->
    <aside id="leftsidebar" class="sidebar overflow-hidden">
    @php
        $route_name = request()->route()->getName();
    @endphp
    <!-- Menu -->
        <div class="menu">
            <ul class="list">
                <li class="{{ stripos($route_name, 'product') !== false ? 'active' : '' }}">
                    <a href="javascript:void(0);" class="menu-toggle">
                        <i class="material-icons">vertical_split</i>
                        <span>Produtos</span>
                    </a>
                    <ul class="ml-menu">
                        <li class="{{ $route_name == 'produto.index' ? 'active' : '' }}">
                            <a href="{{ route('produto.index') }}">Lista</a>
                        </li>
                        <li class="{{ $route_name == 'produto.create' ? 'active' : '' }}">
                            <a href="{{ route('produto.create') }}">Novo</a>
                        </li>
                    </ul>
                </li>
                <li class="{{ stripos($route_name, 'tag') !== false ? 'active' : '' }}">
                    <a href="javascript:void(0);" class="menu-toggle">
                        <i class="material-icons">tab</i>
                        <span>Tags</span>
                    </a>
                    <ul class="ml-menu">
                        <li class="{{ $route_name == 'tag.index' ? 'active' : '' }}">
                            <a href="{{ route('tag.index') }}">Lista</a>
                        </li>
                        <li class="{{ $route_name == 'tag.create' ? 'active' : '' }}">
                            <a href="{{ route('tag.create') }}">Novo</a>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </aside>
</section>

<section class="content">
    <div class="container-fluid">
        <div class="block-header">
            <h2>@yield('page_title')</h2>
        </div>

        <!-- Widgets -->
        <div class="row clearfix">
            @yield('content')
        </div>
        <!-- #END# Widgets -->
    </div>
</section>

<!-- Jquery Core Js -->
<script src="{{ asset('plugins/jquery/jquery.min.js') }}"></script>

<!-- Bootstrap Core Js -->
<script src="{{ asset('plugins/bootstrap/js/bootstrap.js') }}"></script>

<!-- Select Plugin Js -->
<script src="{{ asset('plugins/bootstrap-select/js/bootstrap-select.js') }}"></script>

<!-- Slimscroll Plugin Js -->
<script src="{{ asset('plugins/jquery-slimscroll/jquery.slimscroll.js') }}"></script>

<!-- Waves Effect Plugin Js -->
<script src="{{ asset('plugins/node-waves/waves.js') }}"></script>

<!-- Jquery CountTo Plugin Js -->
<script src="{{ asset('plugins/jquery-countto/jquery.countTo.js') }}"></script>

<!-- Morris Plugin Js -->
<script src="{{ asset('plugins/raphael/raphael.min.js') }}"></script>
<script src="{{ asset('plugins/morrisjs/morris.js') }}"></script>

<!-- ChartJs -->
{{-- <script src="{{ asset('plugins/chartjs/Chart.bundle.js') }}"></script> --}}

<!-- Flot Charts Plugin Js -->
{{-- <script src="{{ asset('plugins/flot-charts/jquery.flot.js') }}"></script>
<script src="{{ asset('plugins/flot-charts/jquery.flot.resize.js') }}"></script>
<script src="{{ asset('plugins/flot-charts/jquery.flot.pie.js') }}"></script>
<script src="{{ asset('plugins/flot-charts/jquery.flot.categories.js') }}"></script>
<script src="{{ asset('plugins/flot-charts/jquery.flot.time.js') }}"></script> --}}

<!-- Sparkline Chart Plugin Js -->
<script src="{{ asset('plugins/jquery-sparkline/jquery.sparkline.js') }}"></script>

<!-- Custom Js -->
<script src="{{ asset('js/admin/admin.js') }}"></script>
{{-- <script src="{{ asset('js/admin/pages/index.js') }}"></script> --}}

<!-- Demo Js -->
<script src="{{ asset('js/admin/demo.js') }}"></script>

@stack('scripts')
</body>

</html>
