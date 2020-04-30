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
            <div class="collapse navbar-collapse" id="navbar-collapse">
                <ul class="nav navbar-nav navbar-right">
                    <!-- #END# Tasks -->
                    <li class="pull-right"><a href="javascript:void(0);" class="js-right-sidebar" data-close="true"><i class="material-icons">more_vert</i></a></li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- #Top Bar -->
    <section>
        <!-- Left Sidebar -->
        <aside id="leftsidebar" class="sidebar">
            <!-- User Info -->
            <div class="user-info">
                <div class="image">
                    <img src="{{ asset('images/user.png') }}" width="48" height="48" alt="User" />
                </div>
                <div class="info-container">
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                    <div class="name" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">{{ Auth::user()->name }}</div>
                    <div class="email">{{ Auth::user()->email }}</div>
                    <div class="btn-group user-helper-dropdown">
                        <i class="material-icons" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">keyboard_arrow_down</i>
                        <ul class="dropdown-menu pull-right">
                            <li><a href="{{ route('set_locale', 'pt-br') }}"><img src="{{ asset('images/brazil.png') }}" width="20" alt="PT-BR" /> PT-BR </a></li>
                            <li><a href="{{ route('set_locale', 'en') }}"><img src="{{ asset('images/uk.png') }}" width="20" alt="EN" /> EN </a></li>
                            <li role="separator" class="divider"></li>
                            <li>
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                    onclick="event.preventDefault();
                                                document.getElementById('logout-form').submit();">
                                    <i class="material-icons">input</i> {{ trans('auth.sign_out') }}
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- #User Info -->
            @php 
                $route_name = request()->route()->getName();
            @endphp
            <!-- Menu -->
            <div class="menu">
                <ul class="list">
                    <li class="header">{{ trans('pages.main_navigation') }}</li>
                    <li class="{{ stripos($route_name, 'product') !== false ? 'active' : '' }}">
                        <a href="javascript:void(0);" class="menu-toggle">
                            <i class="material-icons">widgets</i>
                            <span>{{ trans('produto') }}</span>
                        </a>
                        <ul class="ml-menu">
                            <li class="{{ $route_name == 'products.index' ? 'active' : '' }}">
                                <a href="{{ route('products.index') }}">{{ trans('pages.product_list') }}</a>
                            </li>
                            <li class="{{ $route_name == 'products.create' ? 'active' : '' }}">
                                <a href="{{ route('products.create') }}">{{ trans('pages.product_add') }}</a>
                            </li>
                        </ul>
                    </li>
                    <li class="{{ stripos($route_name, 'tag') !== false ? 'active' : '' }}">
                        <a href="javascript:void(0);" class="menu-toggle">
                            <i class="material-icons">style</i>
                            <span>{{ trans('pages.tags') }}</span>
                        </a>
                        <ul class="ml-menu">
                            <li class="{{ $route_name == 'tags.index' ? 'active' : '' }}">
                                <a href="{{ route('tags.index') }}">{{ trans('pages.tag_list') }}</a>
                            </li>
                            <li class="{{ $route_name == 'tags.create' ? 'active' : '' }}">
                                <a href="{{ route('tags.create') }}">{{ trans('pages.tag_add') }}</a>
                            </li>
                            <li class="{{ $route_name == 'tags.most_used' ? 'active' : '' }}">
                                <a href="{{ route('tags.most_used') }}">{{ trans('pages.tags_most_used') }}</a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
        </aside>
        <!-- #END# Left Sidebar -->
        <!-- Right Sidebar -->
        <aside id="rightsidebar" class="right-sidebar">
            <ul class="nav nav-tabs tab-nav-right" role="tablist">
                <li role="presentation" class="active"><a href="#skins" data-toggle="tab">SKINS</a></li>
            </ul>
            <div class="tab-content">
                <div role="tabpanel" class="tab-pane fade in active in active" id="skins">
                    <ul class="demo-choose-skin">
                        <li data-theme="red" class="active">
                            <div class="red"></div>
                            <span>{{ trans('colors.red') }}</span>
                        </li>
                        <li data-theme="pink">
                            <div class="pink"></div>
                            <span>{{ trans('colors.pink') }}</span>
                        </li>
                        <li data-theme="purple">
                            <div class="purple"></div>
                            <span>{{ trans('colors.purple') }}</span>
                        </li>
                        <li data-theme="deep-purple">
                            <div class="deep-purple"></div>
                            <span>{{ trans('colors.deep-purple') }}</span>
                        </li>
                        <li data-theme="indigo">
                            <div class="indigo"></div>
                            <span>{{ trans('colors.indigo') }}</span>
                        </li>
                        <li data-theme="blue">
                            <div class="blue"></div>
                            <span>{{ trans('colors.blue') }}</span>
                        </li>
                        <li data-theme="light-blue">
                            <div class="light-blue"></div>
                            <span>{{ trans('colors.light-blue') }}</span>
                        </li>
                        <li data-theme="cyan">
                            <div class="cyan"></div>
                            <span>{{ trans('colors.cyan') }}</span>
                        </li>
                        <li data-theme="teal">
                            <div class="teal"></div>
                            <span>{{ trans('colors.teal') }}</span>
                        </li>
                        <li data-theme="green">
                            <div class="green"></div>
                            <span>{{ trans('colors.green') }}</span>
                        </li>
                        <li data-theme="light-green">
                            <div class="light-green"></div>
                            <span>{{ trans('colors.light-green') }}</span>
                        </li>
                        <li data-theme="lime">
                            <div class="lime"></div>
                            <span>{{ trans('colors.lime') }}</span>
                        </li>
                        <li data-theme="yellow">
                            <div class="yellow"></div>
                            <span>{{ trans('colors.yellow') }}</span>
                        </li>
                        <li data-theme="amber">
                            <div class="amber"></div>
                            <span>{{ trans('colors.amber') }}</span>
                        </li>
                        <li data-theme="orange">
                            <div class="orange"></div>
                            <span>{{ trans('colors.orange') }}</span>
                        </li>
                        <li data-theme="deep-orange">
                            <div class="deep-orange"></div>
                            <span>{{ trans('colors.deep-orange') }}</span>
                        </li>
                        <li data-theme="brown">
                            <div class="brown"></div>
                            <span>{{ trans('colors.brown') }}</span>
                        </li>
                        <li data-theme="grey">
                            <div class="grey"></div>
                            <span>{{ trans('colors.grey') }}</span>
                        </li>
                        <li data-theme="blue-grey">
                            <div class="blue-grey"></div>
                            <span>{{ trans('colors.blue-grey') }}</span>
                        </li>
                        <li data-theme="black">
                            <div class="black"></div>
                            <span>{{ trans('colors.black') }}</span>
                        </li>
                    </ul>
                </div>
            </div>
        </aside>
        <!-- #END# Right Sidebar -->
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
