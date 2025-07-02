<!doctype html>
<html class="fixed sidebar-light">
<head>
    <!-- Basic -->
    <meta charset="UTF-8">
    <title>@yield('title')</title>
    <meta name="keywords" content="HTML5 Admin Template" />
    <meta name="description" content="Porto Admin - Responsive HTML5 Template">
    <meta name="author" content="okler.net">
    <!-- Mobile Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <!-- Web Fonts  -->
    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800|Shadows+Into+Light" rel="stylesheet" type="text/css">
    <!-- Vendor CSS -->
    <link rel="stylesheet" href="/admpanel/vendor/bootstrap/css/bootstrap.css" />
    <link rel="stylesheet" href="/admpanel/vendor/animate/animate.compat.css">
    <link rel="stylesheet" href="/admpanel/vendor/font-awesome/css/all.min.css" />
    <link rel="stylesheet" href="/admpanel/vendor/boxicons/css/boxicons.min.css" />
    <link rel="stylesheet" href="/admpanel/vendor/magnific-popup/magnific-popup.css" />
    <link rel="stylesheet" href="/admpanel/vendor/bootstrap-datepicker/css/bootstrap-datepicker3.css" />
    <link rel="stylesheet" href="/admpanel/vendor/jquery-ui/jquery-ui.css" />
    <link rel="stylesheet" href="/admpanel/vendor/jquery-ui/jquery-ui.theme.css" />
    <link rel="stylesheet" href="/admpanel/vendor/bootstrap-multiselect/css/bootstrap-multiselect.css" />
    <link rel="stylesheet" href="/admpanel/vendor/summernote/summernote-bs4.css" />
    <link rel="stylesheet" href="/admpanel/vendor/morris/morris.css" />
    <!-- Theme CSS -->
    <link rel="stylesheet" href="/admpanel/css/theme.css" />
    <!-- Skin CSS -->
    <link rel="stylesheet" href="/admpanel/css/skins/default.css" />
    <!-- Theme Custom CSS -->
    <link rel="stylesheet" href="/admpanel/css/custom.css">
    <!-- Head Libs -->
    <script src="/admpanel/vendor/modernizr/modernizr.js"></script>
    <script src="/admpanel/vendor/jquery/jquery.js"></script>
</head>
<body>
<section class="body">
    <!-- start: header -->
    <header class="header" style="
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding: 0 1% 0 1%;
"> 
       
            <!-- Logo -->
            <a class="navbar-brand" href="/">
                <img src="/admpanel/img/logo.png" alt="Logo" style="width: 150px;">
            </a>
            <div>
            <form action="http://127.0.0.1:8000/search" class="search nav-form" style="
    width: 300px;
">
                <div class="input-group">
                    <input type="text" class="form-control" name="q" id="q" placeholder="Search...">
                    <span class="input-group-append">
								<button class="btn btn-default" type="submit" style="
    height: 100%;
    background: #e6e7e9;
    width: 45px;
    border-radius: 0px 5px 5px 0px;
"><i class="bx bx-search"></i></button>
							</span>
                </div>
            </form>
            </div>
            
            <!-- Navbar links -->
            <nav style="
">
                <ul class="navbar-nav" style="
    display: flex;
    width: 500px;
    justify-content: space-between;
    flex-direction: row;
">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('about') }}">About</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="https://yonearth.org">YonEarth website</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="https://viriditasbook.com/">Viriditas book</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/podcasts/search">AI guide</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#contact">Contact us</a>
                    </li>
                </ul>
            </nav>
            <div style="
    /* width: 500px; */
    height: 50px;
    display: flex;
    align-items: center;
    align-content: center;
    justify-content: flex-end;
">
                <div class="" style="
    width: 100px;
    display: flex;
    justify-content: space-between;
">
                                            <!-- Ссылка для авторизованного пользователя -->
                                            @if(Auth::check())
                        <!-- Ссылка для авторизованного пользователя -->
                        <a href="{{ url('/admin/profile') }}" class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Admin Panel</a>

                    @else
                        <!-- Ссылки на Вход и Регистрацию для неавторизованного пользователя -->
                        <a href="{{ route('login') }}" class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Login</a>
                        <a href="{{ route('register') }}" class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Register</a>
                    @endif
                </div>
            </div>


    </header>
    <!-- end: header -->
    <div class="inner-wrapper">
        <!-- start: sidebar -->
        <aside id="sidebar-left" class="sidebar-left">
            <div class="sidebar-header">
                <div class="sidebar-title">
                    Navigation
                </div>
                <div class="sidebar-toggle d-none d-md-block" data-toggle-class="sidebar-left-collapsed" data-target="html" data-fire-event="sidebar-left-toggle">
                    <i class="fas fa-bars" aria-label="Toggle sidebar"></i>
                </div>
            </div>
            <div class="nano">
                <div class="nano-content">
                    <nav id="menu" class="nav-main" role="navigation">
                        <ul class="nav nav-main">
                            <li>
                                <a class="nav-link" href="{{ route('news') }}">
                                <i class="fa-regular fa-newspaper"></i>
                                    <span>News</span>
                                </a>
                            </li>
                            <li>
                                <a class="nav-link" href="{{ route('guilds') }}">
                                <i class="fa-solid fa-people-group"></i>
                                    <span>Guilds</span>
                                </a>
                            </li>
                            <li>
                                <a class="nav-link" href="{{ route('projects') }}">
                                <i class="fa-solid fa-handshake"></i>
                                    <span>Projects</span>
                                </a>
                            </li>
                            <li>
                                <a class="nav-link" href="{{ route('contents') }}">
                                    <i class="fa-solid fa-globe"></i>
                                    <span>Contents</span>
                                </a>
                            </li>
                            <li>
                                <a class="nav-link" href="{{ route('market') }}">
                                <i class="fa-solid fa-cart-shopping"></i>
                                    <span>Market</span>
                                </a>
                            </li>
                            <li>
                                <a class="nav-link" href="{{ route('materials') }}">
                                    <i class="fa-solid fa-book"></i>
                                    <span>Academy</span>
                                </a>
                            </li>
                            <li>
                                <a class="nav-link" href="{{ route('podcasts') }}">
                                <i class="fa-solid fa-microphone"></i>
                                    <span>Podcasts</span>
                                </a>
                            </li>

                        </ul>
                    </nav>

                </div>
                <script>
                    // Maintain Scroll Position
                    if (typeof localStorage !== 'undefined') {
                        if (localStorage.getItem('sidebar-left-position') !== null) {
                            var initialPosition = localStorage.getItem('sidebar-left-position'),
                                sidebarLeft = document.querySelector('#sidebar-left .nano-content');
                            sidebarLeft.scrollTop = initialPosition;
                        }
                    }
                </script>
            </div>
        </aside>
        <!-- end: sidebar -->
        <section role="main" class="content-body">
            <header class="page-header">
                <h2>@yield('title')</h2>
                <div class="right-wrapper text-end">
                    <ol class="breadcrumbs">
                        <li>
                            <a href="/admin">
                                <i class="bx bx-home-alt"></i>
                            </a>
                        </li>
                        <li><span>@yield('title')</span></li>
                    </ol>
                    <a class="sidebar-right-toggle" data-open="sidebar-right"><i class="fas fa-chevron-left"></i></a>
                </div>
            </header>
            <!-- start: page -->
            @yield('content')

            <!-- end: page -->
        </section>
    </div>
    <aside id="sidebar-right" class="sidebar-right">
        <div class="nano">
            <div class="nano-content">
                <a href="#" class="mobile-close d-md-none">
                    Collapse <i class="fas fa-chevron-right"></i>
                </a>
                <div class="sidebar-right-wrapper">
                    <div class="sidebar-widget widget-calendar">
                        <h6>Upcoming Tasks</h6>
                        <div data-plugin-datepicker data-plugin-skin="dark"></div>
                        <ul>
                            <li>
                                <time datetime="2023-04-19T00:00+00:00">04/19/2023</time>
                                <span>Company Meeting</span>
                            </li>
                        </ul>
                    </div>
                    <div class="sidebar-widget widget-friends">
                        <h6>Friends</h6>
                        <ul>
                            <li class="status-online">
                                <figure class="profile-picture">
                                    <img src="/admpanel/img/!sample-user.jpg" alt="Joseph Doe" class="rounded-circle">
                                </figure>
                                <div class="profile-info">
                                    <span class="name">Joseph Doe Junior</span>
                                    <span class="title">Hey, how are you?</span>
                                </div>
                            </li>
                            <li class="status-online">
                                <figure class="profile-picture">
                                    <img src="/admpanel/img/!sample-user.jpg" alt="Joseph Doe" class="rounded-circle">
                                </figure>
                                <div class="profile-info">
                                    <span class="name">Joseph Doe Junior</span>
                                    <span class="title">Hey, how are you?</span>
                                </div>
                            </li>
                            <li class="status-offline">
                                <figure class="profile-picture">
                                    <img src="/admpanel/img/!sample-user.jpg" alt="Joseph Doe" class="rounded-circle">
                                </figure>
                                <div class="profile-info">
                                    <span class="name">Joseph Doe Junior</span>
                                    <span class="title">Hey, how are you?</span>
                                </div>
                            </li>
                            <li class="status-offline">
                                <figure class="profile-picture">
                                    <img src="/admpanel/img/!sample-user.jpg" alt="Joseph Doe" class="rounded-circle">
                                </figure>
                                <div class="profile-info">
                                    <span class="name">Joseph Doe Junior</span>
                                    <span class="title">Hey, how are you?</span>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </aside>
</section>
<!-- Vendor -->

<script src="/admpanel/vendor/jquery-browser-mobile/jquery.browser.mobile.js"></script>
<script src="/admpanel/vendor/popper/umd/popper.min.js"></script>
<script src="/admpanel/vendor/bootstrap/js/bootstrap.js"></script>
<script src="/admpanel/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="/admpanel/vendor/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
<script src="/admpanel/vendor/common/common.js"></script>
<script src="/admpanel/vendor/nanoscroller/nanoscroller.js"></script>
<script src="/admpanel/vendor/magnific-popup/jquery.magnific-popup.js"></script>
<script src="/admpanel/vendor/jquery-placeholder/jquery.placeholder.js"></script>
<!-- Specific Page Vendor -->
<script src="/admpanel/vendor/jquery-ui/jquery-ui.js"></script>
<script src="/admpanel/vendor/jqueryui-touch-punch/jquery.ui.touch-punch.js"></script>
<script src="/admpanel/vendor/jquery-appear/jquery.appear.js"></script>
<script src="/admpanel/vendor/bootstrap-multiselect/js/bootstrap-multiselect.js"></script>
<script src="/admpanel/vendor/jquery.easy-pie-chart/jquery.easypiechart.js"></script>
<script src="/admpanel/vendor/flot/jquery.flot.js"></script>
<script src="/admpanel/vendor/flot.tooltip/jquery.flot.tooltip.js"></script>
<script src="/admpanel/vendor/flot/jquery.flot.pie.js"></script>
<script src="/admpanel/vendor/flot/jquery.flot.categories.js"></script>
<script src="/admpanel/vendor/flot/jquery.flot.resize.js"></script>
<script src="/admpanel/vendor/jquery-sparkline/jquery.sparkline.js"></script>
<script src="/admpanel/vendor/raphael/raphael.js"></script>
<script src="/admpanel/vendor/morris/morris.js"></script>
<script src="/admpanel/vendor/gauge/gauge.js"></script>
<script src="/admpanel/vendor/snap.svg/snap.svg.js"></script>
<script src="/admpanel/vendor/liquid-meter/liquid.meter.js"></script>
<script src="/admpanel/vendor/jqvmap/jquery.vmap.js"></script>
<script src="/admpanel/vendor/jqvmap/data/jquery.vmap.sampledata.js"></script>
<script src="/admpanel/vendor/jqvmap/maps/jquery.vmap.world.js"></script>
<script src="/admpanel/vendor/jqvmap/maps/continents/jquery.vmap.africa.js"></script>
<script src="/admpanel/vendor/jqvmap/maps/continents/jquery.vmap.asia.js"></script>
<script src="/admpanel/vendor/jqvmap/maps/continents/jquery.vmap.australia.js"></script>
<script src="/admpanel/vendor/jqvmap/maps/continents/jquery.vmap.europe.js"></script>
<script src="/admpanel/vendor/jqvmap/maps/continents/jquery.vmap.north-america.js"></script>
<script src="/admpanel/vendor/jqvmap/maps/continents/jquery.vmap.south-america.js"></script>
<script src="/admpanel/vendor/summernote/summernote-bs4.js"></script>
<!-- Theme Base, Components and Settings -->
<script src="/admpanel/js/theme.js"></script>
<!-- Theme Custom -->
<script src="/admpanel/js/custom.js"></script>
<!-- Theme Initialization Files -->
<script src="/admpanel/js/theme.init.js"></script>

<!-- Examples -->
<script src="/admpanel/js/examples/examples.dashboard.js"></script>
</body>
</html>
