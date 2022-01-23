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
                                    <a class="nav-link" id="account-detail-tab" data-bs-toggle="tab" href="#account-detail" role="tab" aria-controls="account-detail" aria-selected="true"><i class="fi-rs-user mr-10"></i>Account details</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="page-login-register.html"><i class="fi-rs-sign-out mr-10"></i>Logout</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-9">
                        <div class="tab-content dashboard-content">
                            <div class="tab-pane fade active show" id="dashboard" role="tabpanel" aria-labelledby="orders-tab">
                                <div class="card">
                                    <div class="card-header">
                                        <h5 class="mb-0">Setup Account</h5>
                                    </div>
                                    <div class="card-body">
                                        <form action="/dashboard" method="POST" enctype="multipart/form-data">
                                            @csrf
                                            <div class="row">
                                                <div class="form-group col-md-4">
                                                    <label>First Name <span class="required">*</span></label>
                                                    <input class="form-control square" name="first_name" type="text">
                                                </div>
                                                <div class="form-group col-md-4">
                                                    <label>Last Name <span class="required">*</span></label>
                                                    <input class="form-control square" name="last_name">
                                                </div>
                                                <input type="hidden" name="email" value="{{Auth::user()->email}}">
                                                <div class="form-group col-md-8">
                                                    <label>Phone Number <span class="required">*</span></label>
                                                    <input class="form-control square" name="phone_number" type="text">
                                                </div>
                                                <div class="form-group col-md-8">
                                                    <label>Address <span class="required">*</span></label>
                                                    <textarea class="form-control square" name="address" type="text" cols="40" rows="20"></textarea>
                                                </div>
                                                <div class="form-group col-md-8">
                                                    <label>Birthday <span class="required">*</span></label>
                                                    <input class="form-control square" name="birthday" type="date">
                                                </div>
                                                <input type="hidden" name="user_id" value="{{Auth::user()->id}}">
                                                <div class="form-group col-md-8">
                                                    <label>Photo Profile</label>
                                                    <input name="image" class="form-control square" type="file">
                                                </div>
                                                <div class="col-md-12 mt-3">
                                                    <button type="submit" class="btn btn-fill-out submit">Save</button>
                                                </div>
                                            </div>
                                        </form>
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