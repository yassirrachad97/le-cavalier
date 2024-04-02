<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Le cavalier Marketplace</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="Free HTML Templates" name="keywords">
    <meta content="Free HTML Templates" name="description">

    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">

    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="{{ asset('styyle/lib/animate/animate.min.css')}}" rel="stylesheet">
    <link href="{{ asset('styyle/lib/owlcarousel/assets/owl.carousel.min.css')}}" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="{{ asset('styyle/css/style.css')}}" rel="stylesheet">
</head>
<body>
    <!--? Preloader Start -->
    <div id="preloader-active">
        <div class="preloader d-flex align-items-center justify-content-center">
            <div class="preloader-inner position-relative">
                <div class="preloader-circle"></div>
                <div class="preloader-img pere-text">
                    <img src="{{ asset('css/mystyle/img/logo/loader.png') }}" alt="">
                </div>
            </div>
        </div>
    </div>
    <!-- Preloader Start -->
    {{-- <header>
        <!--? Header Start -->
        <div class="header-area">
            <div class="main-header header-sticky">
                <div class="container-fluid">
                    <div class="row align-items-center">
                        <!-- Logo -->
                        <div class="col-xl-2 col-lg-2 col-md-1">
                            <div class="logo">
                                <a href="{{ route('home') }}"><img src="{{ asset('css/mystyle/img/logo/logo.png') }}" alt=""></a>
                            </div>
                        </div>
                        <div class="col-xl-10 col-lg-10 col-md-10">
                            <div class="menu-main d-flex align-items-center justify-content-end">
                                <!-- Main-menu -->
                                <div class="main-menu f-right d-none d-lg-block">
                                    <nav>
                                        <ul id="navigation">
                                            <li><a href="{{ route('home') }}">Home</a></li>
                                            <li><a href="{{ route('login') }}">connexion</a></li>
                                            @auth
                                            @if(Auth::user()->role_id == 1)
                                            <li><a href="{{ route('frentOffice.reservation') }}">pannier</a></li>
                                            @endif
                                            @endauth
                                        </ul>
                                    </nav>
                                </div>
                                <div class="header-right-btn f-right d-none d-lg-block ml-30">
                                    @auth
                                        <div class="dropdown">
                                            <button class="btn header-btn dropdown-toggle" type="button" id="userDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                                                {{ Auth::user()->name }}
                                            </button>
                                            <ul class="dropdown-menu" aria-labelledby="userDropdown">
                                                @auth
                                                @if(Auth::user()->role_id == 3)
                                                <li><a class="dropdown-item" href="{{ route('dashboardAdmn') }}">dashboard admin</a></li>
                                                @endif
                                                @if(Auth::user()->role_id == 2)
                                                <li><a class="dropdown-item" href="{{ route('dashboardOrg') }}">dashboard organisateur</a></li>
                                                @endif
                                                @endauth

                                                <li><hr class="dropdown-divider"></li>
                                                <li>
                                                    <form action="{{ route('auth.logout') }}" method="post">
                                                        @csrf
                                                        <button type="submit" class="dropdown-item">Déconnexion</button>
                                                    </form>
                                                </li>
                                            </ul>
                                        </div>
                                    @endauth
                                </div>

                            </div>
                        </div>
                        <!-- Mobile Menu -->
                        <div class="col-12">
                            <div class="mobile_menu d-block d-lg-none"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Header End -->
    </header> --}}


@yield('home')
@yield('detail')
@yield('content')
@yield('')

  <!-- Footer End -->


    <!-- Back to Top -->
    <a href="#" class="btn btn-primary back-to-top"><i class="fa fa-angle-double-up"></i></a>


    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('styyle/lib/easing/easing.min.js')}}"></script>
    <script src="{{ asset('styyle/lib/owlcarousel/owl.carousel.min.js')}}"></script>

    <!-- Contact Javascript File -->
    <script src="mail/jqBootstrapValidation.min.js"></script>
    <script src="mail/contact.js"></script>

    <!-- Template Javascript -->
    <script src="{{ asset('styyle/js/main.js')}}"></script>
</body>

</html>
