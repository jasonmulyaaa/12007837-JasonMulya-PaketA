<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Meta Tags -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="author" content="themexriver">

    <!-- Page Title -->
    <title> Laporan Pengaduan Masyarakat </title>

    <!-- Icon fonts -->
    <link href="{{ asset('') }}assets/user/css/font-awesome.min.css" rel="stylesheet">
    <link href="{{ asset('') }}assets/user/css/flaticon.css" rel="stylesheet">

    <!-- Bootstrap core CSS -->
    <link href="{{ asset('') }}assets/user/css/bootstrap.min.css" rel="stylesheet">

    <!-- Plugins for this template -->
    <link href="{{ asset('') }}assets/user/css/animate.css" rel="stylesheet">
    <link href="{{ asset('') }}assets/user/css/owl.carousel.css" rel="stylesheet">
    <link href="{{ asset('') }}assets/user/css/owl.theme.css" rel="stylesheet">
    <link href="{{ asset('') }}assets/user/css/slick.css" rel="stylesheet">
    <link href="{{ asset('') }}assets/user/css/slick-theme.css" rel="stylesheet">
    <link href="{{ asset('') }}assets/user/css/owl.transitions.css" rel="stylesheet">
    <link href="{{ asset('') }}assets/user/css/jquery.fancybox.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="{{ asset('') }}assets/user/css/style.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

    <!-- start page-wrapper -->
    <div class="page-wrapper" id="home">

        <!-- start preloader -->
        <div class="preloader">
            <div class="dots">
                <span></span>
                <span></span>
                <span></span>
                <span></span>
            </div>
        </div>
        <!-- end preloader -->

        <!-- Start header -->
        <header id="header" class="site-header header-style-2">
            <nav class="navigation navbar navbar-default">
                <div class="site-logo">
                    <a href="#"><img src="{{ asset('') }}assets/user/images/logo.jpg" alt></a>
                </div>
                <div class="container">
                    <div class="navbar-header">
                        <button type="button" class="open-btn">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                    </div>
                    <div id="navbar" class="navbar-collapse navbar-right collapse navigation-holder">
                        <button class="close-navbar"><i class="fa fa-close"></i></button>
                        <ul class="nav navbar-nav">
                            <li><a href="/">Home</a></li>
                            @if (Auth::guard('masyarakat')->check())
                            <li><a href="/dashboard">Dashboard</a></li>
                            <li><a href="/logout">Logout</a></li>
                            @else
                            <li><a href="{{ route('login') }}">Login</a></li>
                            <li><a href="/register">Register</a></li>
                            @endif

                        </ul>
                    </div><!-- end of nav-collapse -->
                </div><!-- end of container -->
            </nav>
        </header>
        <!-- end of header -->

        @yield('content')

        
        <!-- start site-footer -->
        <footer class="site-footer">
            <div class="upper-footer">
                <div class="container">
                    <div class="row">
                        <div class="col col-md-4 col-sm-6">
                            <div class="widget about-widget">
                                <div class="footer-logo">
                                    <img src="{{ asset('') }}assets/user/images/footer-logo.png" alt>
                                </div>
                                <p>Pengelolaan pengaduan pelayanan masyarakat di desa yang terorganinisir dengan baik yang membuat masyarakat desa merasa puas dengan layanan kami.</p>
                            </div>
                        </div>
                        <div class="col col-md-4 col-sm-6">
                            <div class="widget contact-widget">
                                <h3>Kontak</h3>
                                <ul class="contact-info">
                                    <li><i class="fa fa-phone"></i> +123 (4567) 890</li>
                                    <li><i class="fa fa-envelope"></i> laporanmasyarakat@gmail.com</li>
                                    <li><i class="fa fa-home"></i> Jl. Raya Wangun Kel. Sindangsari, Kota Bogor, Indonesia</li>
                                </ul>
                            </div>
                        </div>

                        <div class="col col-md-4 col-sm-6">
                            <div class="widget quick-links-widget">
                                <h3>Quick Links</h3>
                                <ul>
                                    <li><a href="#">Contact Us</a></li>
                                    <li><a href="#">Submit a Ticket</a></li>
                                    <li><a href="#">Visit Knowledge Base</a></li>
                                    <li><a href="#">Support System</a></li>
                                    <li><a href="#">Refund Policy</a></li>
                                    <li><a href="#">Professional Services</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div> <!-- end upper-footer -->
            <div class="copyright-info">
                <div class="container">
                    <p>2023 &copy; All Rights Reserved by <a>Jason Mulya</a></p>
                </div>
            </div>
        </footer>
        <!-- end site-footer -->
    </div>
    <!-- end of page-wrapper -->


    @include('sweetalert::alert')

    <!-- All JavaScript files
    ================================================== -->
    <script src="{{ asset('') }}assets/user/js/jquery.min.js"></script>
    <script src="{{ asset('') }}assets/user/js/bootstrap.min.js"></script>

    <!-- Plugins for this template -->
    <script src="{{ asset('') }}assets/user/js/jquery-plugin-collection.js"></script>

    <!-- Custom script for this template -->
    <script src="{{ asset('') }}assets/user/js/script.js"></script>
</body>
</html>