<html class="no-js" lang="en">


<!-- Mirrored from wp.alithemes.com/html/evara/evara-frontend/page-404.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 01 Aug 2021 15:27:23 GMT -->
<head>
    <meta charset="utf-8">
    <title>Larashop - Laravel eCommerce</title>
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta property="og:title" content="">
    <meta property="og:type" content="">
    <meta property="og:url" content="">
    <meta property="og:image" content="">
    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="{{asset('assets/backend/imgs/theme/favicon.png')}}">
    <!-- Template CSS -->
    <link rel="stylesheet" href="{{asset('assets/frontend/css/main.css')}}">
</head>

<body>
    <main class="main page-404">
        <div class="container">
            <div class="row align-items-center height-100vh text-center">
                <div class="col-lg-8 m-auto">
                    <p class="mb-50"><img src="{{asset('assets/frontend/imgs/theme/logo.png')}}" alt="" class="hover-up"></p>
                    <h2 class="mb-30">Welcome to Admin Page</h2>
                    <p class="font-lg text-grey-700 mb-30">
                        You are on the admin page. To continue to the dashboard page, you just need to click the button below.
                    </p>
                    @if (Route::has('login'))
                    <div>
                        @auth
                        <a class="btn btn-default submit-auto-width font-xs hover-up" href="{{ url('/admin/home') }}">Dashboard</a>
                        @else
                        <a class="btn btn-default submit-auto-width font-xs hover-up" href="{{ route('login') }}">Login</a>  
                        @endauth
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </main>
    <!-- Script -->
    <script src="{{asset('assets/frontend/js/vendor/jquery-3.6.0.min.js')}}"></script>
    <script src="{{asset('assets/frontend/js/vendor/bootstrap.bundle.min.js')}}"></script>
    <script src="{{asset('assets/frontend/js/plugins/jquery-ui.js')}}"></script>
    <script src="{{asset('assets/frontend/js/main.js')}}"></script>
</body>
</html>

