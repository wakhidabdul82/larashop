<!DOCTYPE html>
<html class="no-js" lang="en">
<head>
    <meta charset="utf-8">
    <title>Larashop - eCommerce Laravel</title>
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta property="og:title" content="">
    <meta property="og:type" content="">
    <meta property="og:url" content="">
    <meta property="og:image" content="">
    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="{{asset('assets/frontend/imgs/theme/favicon.png')}}">
    <!-- Template CSS -->
    <link rel="stylesheet" href="{{asset('assets/frontend/css/main.css')}}">
    @stack('style')
</head>

<body>
    @include('partial.header-frontend')
    <main class="main">
        @yield('content')
    </main>
    @include('partial.footer-frontend')
    <!-- Preloader Start -->
    <div id="preloader-active">
        <div class="preloader d-flex align-items-center justify-content-center">
            <div class="preloader-inner position-relative">
                <div class="text-center">
                    <h5 class="mb-5">Now Loading</h5>
                    <div class="loader">
                        <div class="bar bar1"></div>
                        <div class="bar bar2"></div>
                        <div class="bar bar3"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Vendor JS-->
    <script src="{{asset('assets/frontend/js/vendor/modernizr-3.6.0.min.js')}}"></script>
    <script src="{{asset('assets/frontend/js/vendor/jquery-3.6.0.min.js')}}"></script>
    <script src="{{asset('assets/frontend/js/vendor/jquery-migrate-3.3.0.min.js')}}"></script>
    <script src="{{asset('assets/frontend/js/vendor/bootstrap.bundle.min.js')}}"></script>
    <script src="{{asset('assets/frontend/js/plugins/slick.js')}}"></script>
    <script src="{{asset('assets/frontend/js/plugins/jquery.syotimer.min.js')}}"></script>
    <script src="{{asset('assets/frontend/js/plugins/wow.js')}}"></script>
    <script src="{{asset('assets/frontend/js/plugins/jquery-ui.js')}}"></script>
    <script src="{{asset('assets/frontend/js/plugins/perfect-scrollbar.js')}}"></script>
    <script src="{{asset('assets/frontend/js/plugins/magnific-popup.js')}}"></script>
    <script src="{{asset('assets/frontend/js/plugins/select2.min.js')}}"></script>
    <script src="{{asset('assets/frontend/js/plugins/waypoints.js')}}"></script>
    <script src="{{asset('assets/frontend/js/plugins/counterup.js')}}"></script>
    <script src="{{asset('assets/frontend/js/plugins/jquery.countdown.min.js')}}"></script>
    <script src="{{asset('assets/frontend/js/plugins/images-loaded.js')}}"></script>
    <script src="{{asset('assets/frontend/js/plugins/isotope.js')}}"></script>
    <script src="{{asset('assets/frontend/js/plugins/scrollup.js')}}"></script>
    <script src="{{asset('assets/frontend/js/plugins/jquery.vticker-min.js')}}"></script>
    <script src="{{asset('assets/frontend/js/plugins/jquery.theia.sticky.js')}}"></script>
    <script src="{{asset('assets/frontend/js/plugins/jquery.elevatezoom.js')}}"></script>
    <!-- Template  JS -->
    <script src="{{asset('assets/frontend/js/main.js')}}"></script>
    <script src="{{asset('assets/frontend/js/shop.js')}}"></script>
    @stack('script')
</body>
</html>