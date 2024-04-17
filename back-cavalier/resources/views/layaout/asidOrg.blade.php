<!DOCTYPE html>
<html dir="ltr" lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />

    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="keywords"
        content="wrappixel, admin dashboard, html css dashboard, web dashboard, bootstrap 5 admin, bootstrap 5, css3 dashboard, bootstrap 5 dashboard, Flexy lite admin bootstrap 5 dashboard, frontend, responsive bootstrap 5 admin template, Flexy admin lite design, Flexy admin lite dashboard bootstrap 5 dashboard template" />
    <meta name="description"
        content="Flexy Admin Lite is powerful and clean admin dashboard template, inpired from Bootstrap Framework" />
    <meta name="robots" content="noindex,nofollow" />
    <title>Evento</title>
    <link rel="canonical" href="https://www.wrappixel.com/templates/Flexy-admin-lite/" />

    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('css/mystyle/img/logo/logo.png') }}" />

    <link href="{{ asset('dashstyle/libs/chartist/dist/chartist.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('dashstyle/libs/chartist-plugin-tooltips/dist/chartist-plugin-tooltip.css') }}"
        rel="stylesheet" />


    <link rel="stylesheet" href="{{ asset('css/mystyle/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/mystyle/css/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/mystyle/css/slicknav.css') }}">
    <link rel="stylesheet" href="{{ asset('css/mystyle/css/flaticon.css') }}">
    <link rel="stylesheet" href="{{ asset('css/mystyle/css/gijgo.css') }}">
    <link rel="stylesheet" href="{{ asset('css/mystyle/css/animate.min.cs') }}">
    <link rel="stylesheet" href="{{ asset('css/mystyle/css/magnific-popup.css') }}">
    <link rel="stylesheet" href="{{ asset('css/mystyle/css/fontawesome-all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/mystyle/css/themify-icons.css') }}">
    <link rel="stylesheet" href="{{ asset('css/mystyle/css/slick.css') }}">
    <link rel="stylesheet" href="{{ asset('css/mystyle/css/nice-select.css') }}">
    <link rel="stylesheet" href="{{ asset('css/mystyle/css/style.css') }}">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href="{{ asset('dist/css/style.min.css') }}" rel="stylesheet" />

</head>

<body>

    <div id="main-wrapper" data-layout="vertical" data-navbarbg="skin5" data-sidebartype="full"
        data-sidebar-position="absolute" data-header-position="absolute" data-boxed-layout="full">

        <header class="topbar" data-navbarbg="skin6">
            <nav class="navbar top-navbar navbar-expand-md navbar-light">
                <div class="navbar-header" data-logobg="skin6">

                    <a class="navbar-brand" href="{{ route('home') }}">

                        <b class="logo-icon">

                            <img src="{{ asset('css/mystyle/img/logo/logo.png') }}" alt="homepage" class="dark-logo" />
                        </b>


                    </a>

                    <a class="nav-toggler waves-effect waves-light d-block d-md-none" href=""><i
                            class="mdi mdi-menu"></i></a>
                </div>

                <div class="navbar-collapse collapse" id="navbarSupportedContent" data-navbarbg="skin5">

                    <ul class="navbar-nav float-start me-auto">

                        <li class="nav-item search-box">
                            <a class="nav-link waves-effect waves-dark" href=""><i
                                    class="mdi mdi-magnify me-1"></i>
                                <span class="font-16">Search</span></a>
                            <form class="app-search position-absolute">
                                <input type="text" class="form-control" placeholder="Search &amp; enter" />
                                <a class="srh-btn"><i class="mdi mdi-window-close"></i></a>
                            </form>
                        </li>
                    </ul>

                    <ul class="navbar-nav float-end">

                        <li class="nav-item dropdown">
                            <a class="
                    nav-link
                    dropdown-toggle
                    text-muted
                    waves-effect waves-dark
                    pro-pic
                  "
                                href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown"
                                aria-expanded="false">
                                @auth
                                    <span> {{ Auth::user()->name }}</span>
                                @endauth
                                <img src="{{ asset('dashstyle/images/users/profile.png') }}" alt="user"
                                    class="rounded-circle mx-1" width="31" />
                            </a>

                        </li>

                    </ul>
                </div>
            </nav>
        </header>

        <aside class="left-sidebar" data-sidebarbg="skin6">
            <!-- Sidebar scroll-->
            <div class="scroll-sidebar">

                <nav class="sidebar-nav">
                    <ul id="sidebarnav">




                        <li class="sidebar-item">
                            <a class="sidebar-link waves-effect waves-dark sidebar-link" href="starter-kit.html"
                                aria-expanded="false"><i class="mdi mdi-file"></i><span
                                    class="hide-menu">statistiques</span></a>
                        </li>

                        <li class="sidebar-item">
                            <a class="sidebar-link waves-effect waves-dark sidebar-link" href="{{ route('reservation.organisateur') }}"
                                aria-expanded="false"><i class="mdi mdi-border-all"></i><span
                                    class="hide-menu">reservation</span></a>
                        </li>

                        <li class="sidebar-item">
                            <a class="sidebar-link waves-effect waves-dark sidebar-link"
                                href="{{ route('evenements.index') }}" aria-expanded="false"><i
                                    class="mdi mdi-calendar"></i><span class="hide-menu">evenements</span></a>
                        </li>

                    </ul>
                </nav>

            </div>

        </aside>

        <div class="page-wrapper">

            @yield('events')
            @yield('reservation')


            <div class="container-fluid">

            </div>

            <footer class="footer text-center">
                All Rights Reserved by Evento. Designed and Developed by
                <a href="https://youcode.ma/Youssoufia">youcode</a>.
            </footer>

        </div>

    </div>

    <script src="{{ asset('css/mystyle/js/vendor/modernizr-3.5.0.min.js') }}"></script>
    <!-- Jquery, Popper, Bootstrap -->
    <script src="{{ asset('css/mystyle/js/vendor/jquery-1.12.4.min.js') }}"></script>
    <script src="{{ asset('css/mystyle/js/popper.min.js') }}"></script>
    <script src="{{ asset('css/mystyle/js/bootstrap.min.js') }}"></script>
    <!-- Jquery Mobile Menu -->
    <script src="{{ asset('css/mystyle/js/jquery.slicknav.min.js') }}"></script>

    <!-- Jquery Slick , Owl-Carousel Plugins -->
    <script src="{{ asset('css/mystyle/js/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('css/mystyle/js/slick.min.js') }}"></script>
    <!-- One Page, Animated-HeadLin -->
    <script src="{{ asset('css/mystyle/js/wow.min.js') }}"></script>
    <script src="{{ asset('css/mystyle/js/animated.headline.js') }}"></script>
    <script src="{{ asset('css/mystyle/js/jquery.magnific-popup.js') }}"></script>

    <!-- Date Picker -->
    <script src="{{ asset('css/mystyle/js/gijgo.min.js') }}"></script>
    <!-- Nice-select, sticky -->
    <script src="{{ asset('css/mystyle/js/jquery.nice-select.min.js') }}"></script>
    <script src="{{ asset('css/mystyle/js/jquery.sticky.js') }}"></script>

    <!-- counter , waypoint -->
    <script src="{{ asset('css/mystyle/js/jquery.counterup.min.js') }}"></script>
    <script src="{{ asset('css/mystyle/js/waypoints.min.js') }}"></script>
    <script src="{{ asset('css/mystyle/js/jquery.countdown.min.js') }}"></script>
    <!-- contact js -->
    <script src="{{ asset('css/mystyle/js/contact.js') }}"></script>
    <script src="{{ asset('css/mystyle/js/jquery.form.js') }}"></script>
    <script src="{{ asset('css/mystyle/js/jquery.validate.min.js') }}"></script>
    <script src="{{ asset('css/mystyle/js/mail-script.js') }}"></script>
    <script src="{{ asset('css/mystyle/js/jquery.ajaxchimp.min.js') }}"></script>

    <!-- Jquery Plugins, main Jquery -->
    <script src="{{ asset('css/mystyle/js/plugins.js') }}"></script>
    <script src="{{ asset('css/mystyle/js/main.js') }}"></script>


    <script src="{{ asset('dashstyle/libs/jquery/dist/jquery.min.js') }}"></script>

    <script src="{{ asset('dashstyle/libs/bootstrap/dist/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('dashstyle/libs/bootstrap/dist/js/app-style-switcher.js') }}"></script>

    <script src="{{ asset('dist/js/waves.js') }}"></script>

    <script src="{{ asset('dist/js/sidebarmenu.js') }}"></script>

    <script src="{{ asset('dist/js/custom.js') }}"></script>

    <script src="{{ asset('dashstyle/libs/chartist/dist/chartist.min.js') }}"></script>
    <script src="{{ asset('dashstyle/libs/chartist-plugin-tooltips/dist/chartist-plugin-tooltip.min.jss') }}"></script>
    <script src="{{ asset('dist/js/pages/dashboards/dashboard1.js') }}"></script>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
        integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"
        integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous">
    </script>
</body>

</html>
