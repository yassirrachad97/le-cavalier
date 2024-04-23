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
    <title>Cavalier</title>
    <link rel="canonical" href="https://www.wrappixel.com/templates/Flexy-admin-lite/" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" rel="stylesheet">

    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('styyle/img/tbourida-4.png') }}" />

    <link href="{{ asset('dashstyle/libs/chartist/dist/chartist.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('dashstyle/libs/chartist-plugin-tooltips/dist/chartist-plugin-tooltip.css') }}"
        rel="stylesheet" />


        <link rel="stylesheet" href="{{ asset('dashstyle/css/bootstrap.min.css') }}">
	<link rel="stylesheet" href="{{ asset('dashstyle/css/owl.carousel.min.css') }}">
	<link rel="stylesheet" href="{{ asset('dashstyle/css/slicknav.css') }}">
	<link rel="stylesheet" href="{{ asset('dashstyle/css/app2.css') }}">
    <link rel="stylesheet" href="{{ asset('dashstyle/css/flaticon.css') }}">
    <link rel="stylesheet" href="{{ asset('dashstyle/css/gijgo.css') }}">
	<link rel="stylesheet" href="{{ asset('dashstyle/css/animate.min.cs')}}">
	<link rel="stylesheet" href="{{ asset('dashstyle/css/magnific-popup.css')}}">
	<link rel="stylesheet" href="{{ asset('dashstyle/css/fontawesome-all.min.css')}}">
	<link rel="stylesheet" href="{{ asset('dashstyle/css/themify-icons.css')}}">
	<link rel="stylesheet" href="{{ asset('dashstyle/css/slick.css')}}">
	<link rel="stylesheet" href="{{ asset('dashstyle/css/nice-select.css')}}">
	<link rel="stylesheet" href="{{ asset('dashstyle/css/style.css') }}">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href="{{ asset('dist/css/style.min.css') }}" rel="stylesheet" />

</head>

<body>

    <div id="main-wrapper" data-layout="vertical" data-navbarbg="skin5" data-sidebartype="full"
        data-sidebar-position="absolute" data-header-position="absolute" data-boxed-layout="full">

        <header class="topbar" data-navbarbg="skin6">
            <nav class="navbar top-navbar navbar-expand-md navbar-light">
                <div class="navbar-header" data-logobg="skin6">

                    <a class="navbar-brand " href="{{ route('frentOffice.home') }}">
                        <img src="{{ asset('styyle/img/tbourida-4.png') }}" alt="logo"  width="30%" />
                        <b class="text-decoration-none m-1">

                            <img src="{{ asset('styyle/img/logo.png') }}" alt="homepage" width="110%" height="60" class="dark-logo" />
                        </b>


                    </a>

                    <a class="nav-toggler waves-effect waves-light d-block d-md-none" href=""><i
                            class="mdi mdi-menu"></i></a>
                </div>

                <div
                class="navbar-collapse collapse"
                id="navbarSupportedContent"
                data-navbarbg="skin5"
              >
                <!-- ============================================================== -->
                <!-- toggle and nav items -->
                <!-- ============================================================== -->
                <ul class="navbar-nav float-start me-auto">
                  <!-- ============================================================== -->
                  <!-- Search -->
                  <!-- ============================================================== -->
                  <li class="nav-item search-box">
                    <a
                      class="nav-link waves-effect waves-dark"
                      href="javascript:void(0)"
                      ><i class="mdi mdi-magnify me-1"></i>
                      <span class="font-16">Search</span></a
                    >
                    <form class="app-search position-absolute">
                      <input
                        type="text"
                        class="form-control"
                        placeholder="Search &amp; enter"
                      />
                      <a class="srh-btn"><i class="mdi mdi-window-close"></i></a>
                    </form>
                  </li>
                </ul>
                <!-- ============================================================== -->
                <!-- Right side toggle and nav items -->
                <!-- ============================================================== -->
                <ul class="navbar-nav float-end">
                  <!-- ============================================================== -->
                  <!-- User profile and search -->
                  <!-- ============================================================== -->
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
                                <span>{{ Auth::user()->first_name . ' ' . Auth::user()->last_name }}</span>
                                @endauth
                                @if (Auth::check() && Auth::user()->image)
                                <img class="rounded-circle mt-5" width="90px" src="{{asset('storage/'.Auth::user()->image)}}"
                                    alt="user photo">
                                    @else
                                    <img src="{{ asset('dashstyle/images/users/profile.png') }}" alt="user"
                                                    class="roundede-circle mx-1" width="31" />
                                    @endif
                            </a>
                  </li>
                  <!-- ============================================================== -->
                  <!-- User profile and search -->
                  <!-- ============================================================== -->
                </ul>
              </div>
            </nav>
        </header>

        <aside class="left-sidebar" data-sidebarbg="skin6">
            <!-- Sidebar scroll-->

        </aside>


        <br>
        <aside class="left-sidebar" data-sidebarbg="skin6">
            <!-- Sidebar scroll-->
            <div class="scroll-sidebar">
              <!-- Sidebar navigation-->
              <nav class="sidebar-nav">
                <ul id="sidebarnav">
                  <li class="sidebar-item">
                    <a
                      class="sidebar-link waves-effect waves-dark sidebar-link"
                      href="{{ route('annonces.dashIndex') }}"
                      aria-expanded="false"
                      ><i class="mdi mdi-view-dashboard"></i
                      ><span class="hide-menu">Annonces</span></a
                    >
                  </li>
                  <li class="sidebar-item">
                    <a
                      class="sidebar-link waves-effect waves-dark sidebar-link"
                      href="{{ route('user.EditeProfil') }}"
                      aria-expanded="false"
                      ><i class="mdi mdi-face"></i
                      ><span class="hide-menu">Profile</span></a
                    >
                  </li>
                    <li class="sidebar-item">
                        <a
                        class="sidebar-link waves-effect waves-dark sidebar-link"
                        href="{{ route('statistiqueUser') }}"
                        aria-expanded="false"
                        ><i class="mdi mdi-border-all"></i
                        ><span class="hide-menu">Statistiques</span></a
                        >
                  <li class="text-center p-40 upgrade-btn">
                    <div class="btn d-block w-100 btn-danger text-white"
                      target="_blank">
                      <form action="{{ route('auth.logout') }}" method="POST">
                        @csrf
                        <button class="dropdown-item" type="submit">Logout</button>
                    </form>
                      </div>
                  </li>
                </ul>
              </nav>
              <!-- End Sidebar navigation -->
            </div>
            <!-- End Sidebar scroll-->
          </aside>

        <div class="page-wrapper">
            @yield('Annonces')
            @yield('EditeProfil')
            @yield('statistique')


            <div class="container-fluid">

            </div>

            <footer class="footer text-center">
                All Rights Reserved by Evento. Designed and Developed by
                <a href="https://youcode.ma/Youssoufia">youcode</a>.
            </footer>

        </div>

    </div>

    <script src="{{ asset('dashstyle/js/vendor/modernizr-3.5.0.min.js') }}"></script>
    <!-- Jquery, Popper, Bootstrap -->
    <script src="{{ asset('dashstyle/js/vendor/jquery-1.12.4.min.js') }}"></script>
    <script src="{{ asset('dashstyle/js/popper.min.js')}}"></script>
    <script src="{{ asset('dashstyle/js/bootstrap.min.js')}}"></script>
    <!-- Jquery Mobile Menu -->
    <script src="{{ asset('dashstyle/js/jquery.slicknav.min.js')}}"></script>

    <!-- Jquery Slick , Owl-Carousel Plugins -->
    <script src="{{ asset('dashstyle/js/owl.carousel.min.js')}}"></script>
    <script src="{{ asset('dashstyle/js/slick.min.js')}}"></script>
    <!-- One Page, Animated-HeadLin -->
    <script src="{{ asset('dashstyle/js/wow.min.js')}}"></script>
    <script src="{{ asset('dashstyle/js/animated.headline.js')}}"></script>
    <script src="{{ asset('dashstyle/js/jquery.magnific-popup.js')}}"></script>

    <!-- Date Picker -->
    <script src="{{ asset('dashstyle/js/gijgo.min.js')}}"></script>
    <!-- Nice-select, sticky -->
    <script src="{{ asset('dashstyle/js/jquery.nice-select.min.js')}}"></script>
    <script src="{{ asset('dashstyle/js/jquery.sticky.js')}}"></script>

    <!-- counter , waypoint -->
    <script src="{{ asset('dashstyle/js/jquery.counterup.min.js')}}"></script>
    <script src="{{ asset('dashstyle/js/waypoints.min.js')}}"></script>
    <script src="{{ asset('dashstyle/js/jquery.countdown.min.js')}}"></script>
    <!-- contact js -->
    <script src="{{ asset('dashstyle/js/contact.js')}}"></script>
    <script src="{{ asset('dashstyle/js/jquery.form.js')}}"></script>
    <script src="{{ asset('dashstyle/js/jquery.validate.min.js')}}"></script>
    <script src="{{ asset('dashstyle/js/mail-script.js')}}"></script>
    <script src="{{ asset('dashstyle/js/jquery.ajaxchimp.min.js')}}"></script>

    <!-- Jquery Plugins, main Jquery -->
    <script src="{{ asset('dashstyle/js/plugins.js')}}"></script>
    <script src="{{ asset('dashstyle/js/main.js')}}"></script>


    <script src="{{ asset('dashstyle/libs/jquery/dist/jquery.min.js') }}"></script>

    <script src="{{ asset('dashstyle/libs/bootstrap/dist/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('dashstyle/libs/bootstrap/dist/js/app-style-switcher.js') }}"></script>

    <script src="{{ asset('dist/js/waves.js') }}"></script>

    <script src="{{ asset('dist/js/sidebarmenu.js') }}"></script>

    <script src="{{ asset('dist/js/custom.js') }}"></script>

    <script src="{{ asset('dashstyle/libs/chartist/dist/chartist.min.js') }}"></script>
    <script src="{{ asset('dashstyle/libs/chartist-plugin-tooltips/dist/chartist-plugin-tooltip.min.jss') }}"></script>
    <script src="{{ asset('dist/js/pages/dashboards/dashboard1.js') }}"></script>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
</body>

</html>
