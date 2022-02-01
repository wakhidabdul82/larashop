<html class="no-js" lang="en">
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
    <main class="main">
        <div class="container">
            <div class="row align-items-center mt-100 text-center">
                <div class="col-lg-8 m-auto">
                    <p class="mb-50"><img src="{{asset('assets/frontend/imgs/theme/logo.png')}}" alt="" class="hover-up" style="width: 200px"></p>
                    <h4>Your order Confirmed!</h4> <span class="font-weight-bold d-block mt-4">Hello, {{Auth::user()->name}}</span> <span>You order has been confirmed and will be shipped in next days!</span><br>
                    <span>Note : Please check your detail order on <strong>Dashboard</strong> page then find <strong>Order</strong> tab.</span><br><br>
                    <a href="/dashboard" class="btn btn-sm">Dashboard</a>
                </div>
            </div>
        </div>
    </main>
    <!-- Script -->
    <script src="{{asset('assets/frontend/js/vendor/jquery-3.6.0.min.js')}}"></script>
    <script src="{{asset('assets/frontend/js/vendor/bootstrap.bundle.min.js')}}"></script>
    <script src="{{asset('assets/frontend/js/plugins/jquery-ui.js')}}"></script>
    <script src="{{asset('assets/frontend/js/main.js')}}"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    @if(session('status'))
        <script>
            swal("{{session('status')}}", {
                icon :"success",
                timer : 3000,
            });
        </script>
    @endif
</body>
</html>

