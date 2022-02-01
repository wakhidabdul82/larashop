@extends('layout.master-frontend')

@section('content')
<div class="page-header breadcrumb-wrap">
    <div class="container">
        <div class="breadcrumb">
            <a href="/shop" rel="nofollow">Home</a>
            <span></span> Dashboard
            <span></span> Detail Order
        </div>
    </div>
</div>
<section class="mt-50 mb-50">
    <div class="container">
        <div class="row">
            <div class="col-lg-9">
                <div class="card">
                    <div class="card-body">

                        <!-- Invoice Logo-->
                        <div class="clearfix mt-10">
                            <div class="float-start mb-3">
                                <img src="{{asset('assets/frontend/imgs/theme/logo.png')}}" alt="" height="25">
                            </div>
                            <div class="float-end">
                                <h4 class="m-0 d-print-none">Invoice</h4>
                            </div>
                        </div>

                        <!-- Invoice Detail-->
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="float-end mt-3">
                                    <p><b>Hello, {{$orders->first_name}}</b></p>
                                    <span class="text-muted font-13">Please find below a cost-breakdown for the recent work completed. Please make payment at your earliest convenience, and do not hesitate to contact me with any questions.</span>
                                </div>

                            </div><!-- end col -->
                            <div class="col-sm-4 offset-sm-2">
                                <div class="mt-3 float-sm-end">
                                    <p style="font-size: 13px"><strong>Order Date: </strong> &nbsp;&nbsp;&nbsp; {{convert_date($orders->created_at)}}</p>
                                    @if($orders->status == 'pending')
                                    <p style="font-size: 13px"><strong>Order Status: </strong> <span class="badge bg-warning float-end">{{$orders->status}}</span></p>
                                    @else
                                    <p style="font-size: 13px"><strong>Order Status: </strong> <span class="badge bg-success float-end">Paid</span></p>
                                    @endif
                                    <p style="font-size: 13px"><strong>Invoice : </strong> <span class="float-end">{{$orders->invoice}}</span></p>
                                </div>
                            </div><!-- end col -->
                        </div>
                        <!-- end row -->

                        <div class="row mt-4">
                            <div class="col-sm-4">
                                <h5>Shipping Address</h5>
                                <hr>
                                <address>
                                    {{$orders->first_name}} {{$orders->last_name}}<br>
                                    {{$orders->address}}<br>
                                    {{$orders->city}}, {{$orders->state}} {{$orders->postcode}}<br>
                                    <abbr title="Phone">Phone:</abbr> {{$orders->phone_number}}
                                </address>
                            </div> <!-- end col-->
                            <div class="col-sm-8">
                                <div class="text-sm-end">
                                    <img src="{{asset('assets/frontend/imgs/page/barcode.png')}}" alt="barcode-image" class="img-fluid me-2" />
                                </div>
                            </div> <!-- end col-->
                        </div>    
                        <!-- end row -->        

                        <div class="row">
                            <div class="col-12">
                                <div class="table-responsive">
                                    <table class="table mt-4">
                                        <thead>
                                        <tr>
                                            <th>Item</th>
                                            <th>Quantity</th>
                                            <th>Unit Cost</th>
                                            <th class="text-end">Total</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @php $total = 0 @endphp
                                        @if($orders->orderItems)
                                        @foreach ($orders->orderItems as $item)
                                        @php $total += $item->products->promo_price * $item->qty @endphp 
                                        <tr>
                                            <td>
                                                {{$item->products->title}}
                                            </td>
                                            <td>{{$item->qty}}</td>
                                            <td>@currency($item->products->promo_price)</td>
                                            <td class="text-end">@currency($item->products->promo_price * $item->qty)</td>
                                        </tr>
                                        @endforeach
                                        @endif
                                        </tbody>
                                    </table>
                                </div> <!-- end table-responsive-->
                            </div> <!-- end col -->
                        </div>
                        <!-- end row -->

                        <div class="row">
                            <div class="col-sm-6">
                                <div class="clearfix pt-3">
                                    <h6 class="text-muted">Notes:</h6>
                                    <small>
                                        All accounts are to be paid within 7 days from receipt of
                                        invoice. To be paid by cheque or credit card or direct payment
                                        online. If account is not paid within 7 days the credits details
                                        supplied as confirmation of work undertaken will be charged the
                                        agreed quoted fee noted above.
                                    </small>
                                </div>
                            </div> <!-- end col -->
                            <div class="col-sm-6">
                                <div class="float-end mt-3 mt-sm-0">
                                    <p><b>Sub-total:</b>&emsp; &emsp;<span class="float-end">@currency($total)</span></p>
                                    <p><b>Shipping Fee:</b> &emsp;<span class="float-end">Free</span></p><br><br>
                                    <h3>Total : @currency($total)</h3>
                                </div>
                                <div class="clearfix"></div>
                            </div> <!-- end col -->
                        </div>
                        <!-- end row-->

                        <div class="d-print-none mt-4">
                            <div class="text-end">
                                <a href="javascript:window.print()" class="btn btn-sm btn-primary"><i class="mdi mdi-printer"></i> Print</a>
                                <a href="javascript: void(0);" class="btn btn-sm btn-info" style="margin-left: 5px">Submit</a>
                            </div>
                        </div>   
                        <!-- end buttons -->

                    </div> <!-- end card-body-->
                </div> <!-- end card -->
            </div>
            <div class="col-lg-3 primary-sidebar sticky-sidebar">
                <div class="row">
                    <div class="col-lg-12 col-mg-6"></div>
                    <div class="col-lg-12 col-mg-6"></div>
                </div>
                <div class="widget-category mb-30">
                    <h5 class="section-title style-1 mb-30 wow fadeIn animated">Category</h5>
                    <ul class="categories">
                        @foreach ($categories as $category)
                        <li><a href="{{ route('shop.index', ['category' => $category->slug]) }}">{{$category->name}}</a></li>
                        @endforeach
                        <div class="dropdown-divider"></div>
                        <li><a href="/shop">View All</a></li>
                    </ul>
                </div>  
            </div>
        </div>
    </div>
</section>
@endsection