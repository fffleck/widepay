<!DOCTYPE html>
<!--[if IE 8]>			<html class="ie ie8" lang="{{ str_replace('_', '-', app()->getLocale()) }}"> <![endif]-->
<!--[if IE 9]>			<html class="ie ie9" lang="{{ str_replace('_', '-', app()->getLocale()) }}"> <![endif]-->
<!--[if gt IE 9]><!-->	<html lang="{{ str_replace('_', '-', app()->getLocale()) }}"><!--<![endif]-->

<!-- Specific Page Data -->

<!-- End of Data -->

<head>
    <meta charset="utf-8" />
    <title>AWS Capital Group</title>
    <meta name="keywords" content="HTML5 Template, CSS3, All Purpose Admin Template, Vendroid" />
    <meta name="description" content="Layout Double Side Nav - Responsive Admin HTML Template ">
    <meta name="author" content="Venmond">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Set the viewport width to device width for mobile -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Fav and touch icons -->
    {{--<link rel="apple-touch-icon-precomposed" sizes="144x144" href="img/ico/apple-touch-icon-144-precomposed.png">--}}
    {{--<link rel="apple-touch-icon-precomposed" sizes="114x114" href="img/ico/apple-touch-icon-114-precomposed.png">--}}
    {{--<link rel="apple-touch-icon-precomposed" sizes="72x72" href="img/ico/apple-touch-icon-72-precomposed.png">--}}
    {{--<link rel="apple-touch-icon-precomposed" href="img/ico/apple-touch-icon-57-precomposed.png">--}}
    {{--<link rel="shortcut icon" href="img/ico/favicon.png">--}}

    <!-- CSS -->
    <!-- Bootstrap & FontAwesome & Entypo CSS -->
    <!--<link href="/v1/css/bootstrap.min.css" rel="stylesheet" type="text/css">-->
    <link href="/v1/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <!--[if IE 7]><link type="text/css" rel="stylesheet" href="v1/css/font-awesome-ie7.min.css"><![endif]-->
    <link href="/v1/css/font-entypo.css" rel="stylesheet" type="text/css">
    <!-- Fonts CSS -->
    <link href="/v1/css/fonts.css"  rel="stylesheet" type="text/css">
    <!-- Plugin CSS -->
    <link href="/v1/plugins/jquery-ui/jquery-ui.custom.min.css" rel="stylesheet" type="text/css">
    <link href="/v1/plugins/prettyPhoto-plugin/css/prettyPhoto.css" rel="stylesheet" type="text/css">
    <link href="/v1/plugins/isotope/css/isotope.css" rel="stylesheet" type="text/css">
    <link href="/v1/plugins/pnotify/css/jquery.pnotify.css" media="screen" rel="stylesheet" type="text/css">
    <link href="/v1/plugins/google-code-prettify/prettify.css" rel="stylesheet" type="text/css">
    <link href="/v1/plugins/mCustomScrollbar/jquery.mCustomScrollbar.css" rel="stylesheet" type="text/css">
    <link href="/v1/plugins/tagsInput/jquery.tagsinput.css" rel="stylesheet" type="text/css">
    <link href="/v1/plugins/bootstrap-switch/bootstrap-switch.css" rel="stylesheet" type="text/css">
    <link href="/v1/plugins/daterangepicker/daterangepicker-bs3.css" rel="stylesheet" type="text/css">
    <link href="/v1/plugins/bootstrap-timepicker/bootstrap-timepicker.min.css" rel="stylesheet" type="text/css">
    <link href="/v1/plugins/colorpicker/css/colorpicker.css" rel="stylesheet" type="text/css">
    <link href="/v1/css/theme.min.css" rel="stylesheet" type="text/css">
    <!--[if IE]> <link href="/v1/css/ie.css" rel="stylesheet" > <![endif]-->
    <link href="/v1/css/chrome.css" rel="stylesheet" type="text/chrome"> <!-- chrome only css -->
    <link href="/v1/css/theme-responsive.min.css" rel="stylesheet" type="text/css">
    <script type="text/javascript" src="/v1/js/modernizr.js"></script>
    <link href="/v1/plugins/sweetalert/sweetalert2.min.css" rel="stylesheet">

    <!-- APP STYLES -->
    <link rel="stylesheet" href="/v1/site/css/app.css" type="text/css">


    <script type="text/javascript" src="/v1/js/mobile-detect.min.js"></script>
    <script type="text/javascript" src="/v1/js/mobile-detect-modernizr.js"></script>
    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script type="text/javascript" src="/v1/js/html5shiv.js"></script>
    <script type="text/javascript" src="/v1/js/respond.min.js"></script>
    <![endif]-->

    @stack('css')
</head>

<body id="layouts" class="full-layout nav-top-fixed no-nav-left nav-right-small responsive clearfix" data-active="layouts "  data-smooth-scrolling="1">
<div class="vd_body d-flex flex-column h-100 overflow-auto" id="app">
    <!-- Header Start -->
    <header class="header-1" id="header">
        <div class="vd_top-menu-wrapper">
            <div class="container">
                <div class="vd_top-nav vd_nav-width  ">
                    <div class="vd_panel-header">

                        <div class="logo">
                            <a href="#"><img alt="logo" src="/v1/img/logo-1-light.png"></a>
                        </div>
                        <!-- logo -->

                        {{--</div>--}}
                        <div class="vd_panel-menu visible-sm visible-xs">
                            <span class="menu visible-xs visible-md visible-lg" data-action="submenu">
                                <i class="fa fa-bars"></i>
                            </span>
                            <!---<span class="menu visible-sm visible-xs" data-action="toggle-navbar-right">
                            <i class="fa fa-comments"></i>-->
                        </span>

                        </div>
                        <!-- vd_panel-menu -->
                    </div>
                    <!-- vd_panel-header -->

                </div>
                <div class="vd_container d-flex justify-content-end">

                        @auth
                            @include('layouts.top_bar_right')
                        @endauth

                </div>
            </div>
            <!-- container -->
        </div>
        <!-- vd_primary-menu-wrapper -->

    </header>
    <!-- Header Ends -->
    <div class="content flex-grow-1">
        <div class="container">
            <!-- Middle Content Start -->
            <div class="vd_content-wrapper">
                <div class="vd_container">
                    <div class="vd_content clearfix">
                        @include('layouts.menu_breadcrumb')
                        <!-- vd_head-section -->

                        @include('layouts.subtitle')
                        <!-- vd_title-section -->

                        <div class="vd_content-section clearfix">

                            @include('components.notifications')

                            @yield('content')

                        </div>
                        <!-- .vd_content-section -->
                    </div>
                    <!-- .vd_content -->
                </div>
                <!-- .vd_container -->
            </div>
            <!-- .vd_content-wrapper -->
            <!-- Middle Content End -->
        </div>
        <!-- .container -->
    </div>
    <!-- .content -->

    <!-- Footer Start -->
    @include('layouts.footer')
    <!-- Footer END -->

</div>
<!-- .vc_body END  -->
<a id="back-top" href="#" data-action="backtop" class="vd_back-top visible"> <i class="fa  fa-angle-up"> </i> </a>

<!--
<a class="back-top" href="#" id="back-top"> <i class="icon-chevron-up icon-white"> </i> </a> -->

<!-- Javascript =============================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<script type="text/javascript" src="/v1/js/jquery.js"></script>
<!--[if lt IE 9]>
<script type="text/javascript" src="/v1/js/excanvas.js"></script>
<![endif]-->
<script type="text/javascript" src="/v1/js/bootstrap.min.js"></script>
{{-- <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script> --}}
<script type="text/javascript" src='/v1/plugins/jquery-ui/jquery-ui.custom.min.js'></script>
<script type="text/javascript" src="/v1/plugins/jquery-ui-touch-punch/jquery.ui.touch-punch.min.js"></script>
<script type="text/javascript" src="/v1/js/caroufredsel.js"></script>
<script type="text/javascript" src="/v1/plugins/breakpoints/breakpoints.js"></script>
<script type="text/javascript" src="/v1/plugins/dataTables/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="/v1/plugins/prettyPhoto-plugin/js/jquery.prettyPhoto.js"></script>
<script type="text/javascript" src="/v1/plugins/mCustomScrollbar/jquery.mCustomScrollbar.concat.min.js"></script>
<script type="text/javascript" src="/v1/plugins/tagsInput/jquery.tagsinput.min.js"></script>
<script type="text/javascript" src="/v1/plugins/bootstrap-switch/bootstrap-switch.min.js"></script>
<script type="text/javascript" src="/v1/plugins/blockUI/jquery.blockUI.js"></script>
<script type="text/javascript" src="/v1/plugins/pnotify/js/jquery.pnotify.min.js"></script>
<script type="text/javascript" src="/v1/js/theme.js"></script>
<script type="text/javascript" src="/v1//js/app.js"></script>
<script type="text/javascript" src="/v1/js/plugins.js"></script>
<script type="text/javascript" src="/v1/plugins/google-code-prettify/prettify.js"></script>

<script type="text/javascript" src="/v1/plugins/sweetalert/sweetalert2.min.js"></script>
<script type="text/javascript" >
    "use strict";
    jQuery(document).ready(function($){prettyPrint();});
</script>

@stack('scripts')

@include('layouts.googleAnalytics')

</body>
</html>