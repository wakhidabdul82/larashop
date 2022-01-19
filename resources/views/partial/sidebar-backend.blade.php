<aside class="navbar-aside" id="offcanvas_aside">
    <div class="aside-top">
        <a href="index.html" class="brand-wrap">
            <img src="{{asset('assets/backend/imgs/theme/logo.png')}}" class="logo" alt="Larashop Dashboard">
        </a>
        <div>
            <button class="btn btn-icon btn-aside-minimize"> <i class="text-muted material-icons md-menu_open"></i> </button>
        </div>
    </div>
    <nav>
        <ul class="menu-aside">
            <li class="menu-item active">
                <a class="menu-link" href="/admin/home"> <i class="icon material-icons md-home"></i>
                    <span class="text">Dashboard</span>
                </a>
            </li>
            <li class="menu-item has-submenu">
                <a class="menu-link" href="products"> <i class="icon material-icons md-shopping_bag"></i>
                    <span class="text">Products</span>
                </a>
                <div class="submenu">
                    <a href="/admin/products">Product List</a>
                    <a href="/admin/categories">Categories</a>
                    <a href="/admin/products/create">Create Product</a>
                </div>
            </li>
            <li class="menu-item">
                <a class="menu-link" href="/admin/orders"> <i class="icon material-icons md-shopping_cart"></i>
                    <span class="text">Orders</span>
                </a>
            </li>
            <li class="menu-item">
                <a class="menu-link" href="/admin/transactions"> <i class="icon material-icons md-monetization_on"></i>
                    <span class="text">Transactions</span>
                </a>
            </li>
            <li class="menu-item">
                <a class="menu-link" href="/admin/customers"> <i class="icon material-icons md-person"></i>
                    <span class="text">Customers</span>
                </a>
            </li>
            <li class="menu-item">
                <a class="menu-link" href="/admin/reviews"> <i class="icon material-icons md-comment"></i>
                    <span class="text">Reviews</span>
                </a>
            </li>
            <li class="menu-item">
                <a class="menu-link" href="{{url('/admin/brands')}}"> <i class="icon material-icons md-stars"></i>
                    <span class="text">Brands</span> </a>
            </li>
            <li class="menu-item">
                <a class="menu-link" disabled href="#"> <i class="icon material-icons md-pie_chart"></i>
                    <span class="text">Statistics</span>
                </a>
            </li>
        </ul>
        <hr>
        <ul class="menu-aside">
            <li class="menu-item has-submenu">
                <a class="menu-link" href="#"> <i class="icon material-icons md-settings"></i>
                    <span class="text">Settings</span>
                </a>
                <div class="submenu">
                    <a href="page-settings-1.html">Setting sample 1</a>
                    <a href="page-settings-2.html">Setting sample 2</a>
                </div>
            </li>
        </ul>
        <br>
        <br>
    </nav>
</aside>