@extends('layout.master-frontend')

@section('content')
<div class="page-header breadcrumb-wrap">
    <div class="container">
        <div class="breadcrumb">
            <a href="index.html" rel="nofollow">Home</a>
            <span></span> Pages
            <span></span> Account
        </div>
    </div>
</div>
<section class="pt-50 pb-50">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 m-auto">
                <div class="row">
                    <div class="col-md-3">
                        <div class="dashboard-menu">
                            <ul class="nav flex-column" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" id="dashboard-tab" data-bs-toggle="tab" href="#dashboard" role="tab" aria-controls="dashboard" aria-selected="false"><i class="fi-rs-settings-sliders mr-10"></i>Dashboard</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="orders-tab" data-bs-toggle="tab" href="#orders" role="tab" aria-controls="orders" aria-selected="false"><i class="fi-rs-shopping-bag mr-10"></i>Orders</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="track-orders-tab" data-bs-toggle="tab" href="#carts" role="tab" aria-controls="track-orders" aria-selected="false"><i class="fi-rs-shopping-cart-check mr-10"></i>Carts</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('logout') }}" 
                                    onclick="event.preventDefault();
                                    document.getElementById('logout-form').submit();"><i class="fi-rs-sign-out mr-10"></i>Logout</a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-9">
                        <div class="tab-content dashboard-content">
                            <div class="tab-pane fade active show" id="dashboard" role="tabpanel" aria-labelledby="dashboard-tab">
                                <div class="card">
                                    <div class="card-header">
                                        <h5 class="mb-0">Dashboard</h5>
                                    </div>
                                    <div class="card-body">
                                        <div class="row mt-3">
                                            <div class="col-md-4">
                                                <img src="{{asset('customer/'.$customer->image)}}" class="img-fluid rounded-start" alt="photo profile" width="200px">
                                            </div>
                                            <div class="col-md-8">
                                                <div class="entry-content-2">
                                                    <h3 class="post-title mb-15">
                                                        <a href="#">{{$customer->first_name}} {{$customer->last_name}}</a>
                                                    </h3>
                                                    <div class="entry-meta meta-1 font-xs color-grey mt-10 pb-10">
                                                        <table>
                                                            <tr>
                                                                <th class="col-4">Email</th>
                                                                <td>{{$customer-> email}}</td>
                                                            </tr>
                                                            <tr>
                                                                <th class="col-4">Phone Number</th>
                                                                <td>{{$customer->phone_number}}</td>
                                                            </tr>
                                                            <tr>
                                                                <th class="col-4">Address</th>
                                                                <td>{{$customer->address}}</td>
                                                            </tr>
                                                            <tr>
                                                                <th class="col-4">Birthday</th>
                                                                <td>{{$customer->birthday}}</td>
                                                            </tr>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="orders" role="tabpanel" aria-labelledby="orders-tab">
                                <div class="card">
                                    <div class="card-header">
                                        <h5 class="mb-0">Orders</h5>
                                    </div>
                                    <div class="card-body">
                                        <p>You are on order page</p>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="carts" role="tabpanel" aria-labelledby="orders-tab">
                                <div class="card">
                                    <div class="card-header">
                                        <h5 class="mb-0">Carts</h5>
                                    </div>
                                    <div class="card-body">
                                        <p>You are on carts page</p>
                                    </div>
                                </div>
                            </div>  
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection