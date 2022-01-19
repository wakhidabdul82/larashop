<!DOCTYPE HTML>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Larashop Dashboard</title>
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
    <link href="{{asset('assets/backend/css/main.css')}}" rel="stylesheet" type="text/css" />
    @stack('style')
</head>

<body>
    <div class="screen-overlay"></div>
    @include('partial.sidebar-backend')
    <main class="main-wrap">
        @include('partial.header-backend')
        <section class="content-main">
            <div class="content-header">
                <div>
                    <h2 class="content-title card-title">@yield('title')</h2>
                </div>
                @yield('any')
            </div>
            @yield('content') <!-- card end// -->
        </section> <!-- content-main end// -->
        @include('partial.footer-backend')
    </main>
    <script src="https://cdn.jsdelivr.net/npm/vue@2.6.14/dist/vue.js"></script>
    <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
    <script src="{{asset('assets/backend/js/vendors/jquery-3.6.0.min.js')}}"></script>
    <script src="{{asset('assets/backend/js/vendors/bootstrap.bundle.min.js')}}"></script>
    <script src="{{asset('assets/backend/js/vendors/select2.min.js')}}"></script>
    <script src="{{asset('assets/backend/js/vendors/perfect-scrollbar.js')}}"></script>
    <script src="{{asset('assets/backend/js/vendors/jquery.fullscreen.min.js')}}"></script>
    <!-- Main Script -->
    <script src="{{asset('assets/backend/js/main.js')}}" type="text/javascript"></script>
    @stack('script')
</body>
</html>