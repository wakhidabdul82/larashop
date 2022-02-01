@extends('layout.master-backend')

@push('script')
<script>
    $(function () {
        
        if ($('#myChart').length) {
        var data_line = '{!!json_encode($data_line)!!}';
        var ctx = document.getElementById('myChart').getContext('2d');
        var chart = new Chart(ctx, {
            // The type of chart we want to create
            type: 'line',
            
            // The data for our dataset
            data: {
                labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
                datasets: JSON.parse(data_line)
            },
            options: {
                plugins: {
                legend: {
                    labels: {
                    usePointStyle: true,
                    },
                }
                }
            }
        });
    }

    });
</script>
@endpush

@section('title')
    Dashboard
@endsection
@section('content')
<div class="row">
    <div class="col-lg-3">
        <div class="card card-body mb-4">
            <article class="icontext">
                <span class="icon icon-sm rounded-circle bg-primary-light"><i class="text-primary material-icons md-monetization_on"></i></span>
                <div class="text">
                    <h6 class="mb-1 card-title">Revenue</h6>
                    <span>@currency($revenue)</span>
                    <span class="text-sm">
                        Shipping fees are not included
                    </span>
                </div>
            </article>
        </div>
    </div>
    <div class="col-lg-3">
        <div class="card card-body mb-4">
            <article class="icontext">
                <span class="icon icon-sm rounded-circle bg-success-light"><i class="text-success material-icons md-local_shipping"></i></span>
                <div class="text">
                    <h6 class="mb-1 card-title">Orders</h6> <span>{{$current_order}}</span>
                    <span class="text-sm">
                        Excluding orders in transit
                    </span>
                </div>
            </article>
        </div>
    </div>
    <div class="col-lg-3">
        <div class="card card-body mb-4">
            <article class="icontext">
                <span class="icon icon-sm rounded-circle bg-warning-light"><i class="text-warning material-icons md-qr_code"></i></span>
                <div class="text">
                    <h6 class="mb-1 card-title">Products</h6> <span>{{$count_product}}</span>
                    <span class="text-sm">
                        In {{$count_category}} Categories
                    </span>
                </div>
            </article>
        </div>
    </div>
    <div class="col-lg-3">
        <div class="card card-body mb-4">
            <article class="icontext">
                <span class="icon icon-sm rounded-circle bg-info-light"><i class="text-info material-icons md-shopping_basket"></i></span>
                <div class="text">
                    <h6 class="mb-1 card-title">Monthly Earning</h6> <span>@currency($month_revenue)</span>
                    <span class="text-sm">
                        Based in your local time.
                    </span>
                </div>
            </article>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-xl-7 col-lg-12">
        <div class="card mb-4">
            <article class="card-body">
                <h5 class="card-title">Sale statistics</h5>
                <canvas id="myChart" height="120px"></canvas>
            </article>
        </div>
    </div>
    <div class="col-xl-5 col-lg-12">
        <div class="card mb-4">
            <article class="card-body">
                <h5 class="card-title">Top Sell Product</h5>
                <div class="table-responsive">
                    <table class="table align-middle mb-0" style="width: 100%">
                        <thead>
                            <th style="width: 10%">#</th>
                            <th>Product</th>
                            <th>Available</th>
                            <th>Sell</th>
                        </thead>
                        <tbody>
                            @foreach ($orderItems as $item)    
                            <tr>
                                <td>{{$item->products->id}}</td>
                                <td>{{Str::limit($item->products->title, 20)}}</td>
                                <td>{{$item->products->stock}}</td>
                                <td>{{$item->qty}}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table> 
                </div>
            </article>
        </div>
    </div>
</div>
<div class="card mb-4">
    <div class="card-header">
        <h4>Latest orders</h4>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <div class="table-responsive">
                <table class="table align-middle table-nowrap mb-0">
                    <thead class="table-light">
                        <tr>
                            <th class="align-middle" scope="col">Order ID</th>
                            <th class="align-middle" scope="col">Billing Name</th>
                            <th class="align-middle" scope="col">Date</th>
                            <th class="align-middle" scope="col">Total</th>
                            <th class="align-middle" scope="col">Payment Status</th>
                            <th class="align-middle" scope="col">Payment Method</th>
                            <th class="align-middle" scope="col">View Details</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($realorders as $item)  
                        <tr>
                            <td><a href="#" class="fw-bold">{{$item->invoice}}</a> </td>
                            <td>{{$item->first_name}} {{$item->last_name}}</td>
                            <td>
                                {{convert_date($item->created_at)}}
                            </td>
                            <td>
                                @currency($item->total_payment)
                            </td>
                            <td>
                                <span class="badge badge-pill badge-soft-success">{{$item->status}}</span>
                            </td>
                            <td>
                                <i class="material-icons md-payment font-xxl text-muted mr-5"></i> COD
                            </td>
                            <td>
                                <a href="/admin/orders/{{$item->id}}/edit" class="btn btn-xs"> View details</a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div> 
    </div>
</div>
@endsection
