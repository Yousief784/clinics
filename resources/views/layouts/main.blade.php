<!DOCTYPE html>
<html dir="ltr" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="keywords"
          content="wrappixel, admin dashboard, html css dashboard, web dashboard, bootstrap 5 admin, bootstrap 5, css3 dashboard, bootstrap 5 dashboard, Ample lite admin bootstrap 5 dashboard, frontend, responsive bootstrap 5 admin template, Ample admin lite dashboard bootstrap 5 dashboard template">
    <meta name="description"
          content="Ample Admin Lite is powerful and clean admin dashboard template, inpired from Bootstrap Framework">
    <meta name="robots" content="noindex,nofollow">
    <title>Ample Admin Lite Template by WrapPixel</title>
    <link rel="canonical" href="https://www.wrappixel.com/templates/ample-admin-lite/" />
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('plugins/images/favicon.png') }}">
    <!-- Custom CSS -->
    <link href="{{ asset('plugins/bower_components/chartist/dist/chartist.min.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('plugins/bower_components/chartist-plugin-tooltips/dist/chartist-plugin-tooltip.css') }}">
    <!-- Custom CSS -->
    <link href="{{ asset('css/style.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/jquery-ui.min.css') }}">
    <script src="{{ asset('js/jquery-3.6.0.min.js') }}" ></script>
    <script src="{{ asset('js/jquery-ui.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/jquery.timepicker.min.js') }}"></script>
    <link rel="stylesheet" type="text/css" href="{{ asset('css/jquery.timepicker.min.css') }}" />

</head>

<body class="" style="background-color: #eee" >
<!-- ============================================================== -->
<!-- Preloader - style you can find in spinners.css -->
<!-- ============================================================== -->
{{--<div class="preloader">--}}
{{--    <div class="lds-ripple">--}}
{{--        <div class="lds-pos"></div>--}}
{{--        <div class="lds-pos"></div>--}}
{{--    </div>--}}
{{--</div>--}}
<!-- ============================================================== -->
<!-- Main wrapper - style you can find in pages.scss -->
<!-- ============================================================== -->
<div id="main-wrapper" data-layout="vertical" data-navbarbg="skin5" data-sidebartype="full" data-sidebar-position="absolute" data-header-position="absolute" data-boxed-layout="full">
    <!-- ============================================================== -->
    <!-- Topbar header - style you can find in pages.scss -->
    <header>
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container-fluid">
                <a class="navbar-brand" href="#">
                    <!-- Logo icon -->
                    <b class="logo-icon">
                        <!-- Dark Logo icon -->
                        <img src="{{ asset('plugins/images/logo-icon.png') }}" alt="homepage" />
                    </b>
                    <!--End Logo icon -->
                    <!-- Logo text -->
                    <span class="logo-text">
                            <!-- dark Logo text -->
                            <img src="{{ asset('plugins/images/logo-text.png') }}" alt="homepage" />
                        </span>
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    </ul>
                    @guest
                        <a href="{{ route('register') }}" class="btn btn-outline-dark me-3">Register</a>
                        <a href="{{ route('login') }}" class="btn btn-outline-dark me-3">Login</a>
                    @endguest
                    <div class="dropdown me-4">
                        <button class="btn btn-outline-info dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
{{--                            {{ LaravelLocalization::getCurrentLocaleNative() }}--}}
                        </button>
                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
{{--                            @foreach(LaravelLocalization::getSupportedLocales() as $code => $locale)--}}
{{--                                <li><a class="dropdown-item" href="{{ LaravelLocalization::getLocalizedURL($code) }}">{{ $locale['native'] }}</a></li>--}}
{{--                            @endforeach--}}
                        </ul>

                    </div>
                    @auth
                        <form action="{{ route('logout') }}" method="post">
                            @csrf
                            <input type="submit" class="btn btn-outline-danger me-3" value="Logout">
                        </form>
                    @endauth
                    <form class="d-flex">
                        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                        <button class="btn btn-outline-success" type="submit">Search</button>
                    </form>
                    @auth
                        <a class="profile-pic" href="#">
{{--                            <img src="{{ asset('uploda_files/images/user_image/'. \Illuminate\Support\Facades\Auth::user()->user_image) }}" alt="user-img" width="36" class="rounded-circle mx-4">--}}
                            <div class="dropdown dropstart me-5">
                                <a class="btn btn-outline-primary btn-sm dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
{{--                                    {{ auth()->user()->firstname }}--}}Ahmed
                                </a>
                                <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                    <li><a href="#" class="dropdown-link">Settings</a></li>
                                </ul>
                            </div>
                        </a>
                    @endauth

                </div>
            </div>
        </nav>
    </header>
    <!-- ============================================================== -->
    <!-- End Topbar header -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- Left Sidebar - style you can find in sidebar.scss  -->
    <!-- ============================================================== -->
{{--    <div class="page-wrapper">--}}
        <!-- ============================================================== -->
        <!-- Container fluid  -->
        <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- RECENT SALES -->
            <!-- ============================================================== -->
            <div class="row mt-3">
                <div class="col-md-12 col-lg-12 mx-auto">
                    @yield('content')
                </div>
            </div>
{{--        </div>--}}
        <!-- ============================================================== -->
        <!-- End Container fluid  -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- footer -->
        <!-- ============================================================== -->
        <footer class="footer text-center"> 2021 © Ample Admin brought to you by <a href="https://www.wrappixel.com/">wrappixel.com</a>
        </footer>
        <!-- ============================================================== -->
        <!-- End footer -->
        <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- End Page wrapper  -->
    <!-- ============================================================== -->
</div>
<!-- ============================================================== -->
<!-- End Wrapper -->
<!-- ============================================================== -->
<!-- ============================================================== -->
<!-- All Jquery -->

<script src=" {{ asset('js/bootstrap.bundle.min.js') }}"></script>
</body>

</html>
