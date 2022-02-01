@extends('layout.master-frontend')

@section('content')
<div class="page-header breadcrumb-wrap">
    <div class="container">
        <div class="breadcrumb">
            <a href="index.html" rel="nofollow">Home</a>
            <span></span> Shop
            <span></span> Checkout
        </div>
    </div>
</div>
<section class="mt-30 mb-50">
    <div class="container">
        <form action="{{url('/place-order')}}" method="POST">
            {{ csrf_field() }}
            <div class="row">
                <input type="hidden" name="user_id" value="{{Auth::id()}}">
                <div class="col-md-6">
                    <div class="mb-25">
                        <h4>Billing Details</h4>
                    </div>
                    @foreach ($customers as $item)
                        <div class="form-group">
                            <input type="text" required="" name="first_name" placeholder="First name *" value="{{$item->first_name}}">
                        </div>
                        <div class="form-group">
                            <input type="text" required="" name="last_name" placeholder="Last name *" value="{{$item->last_name}}">
                        </div>
                        <div class="form-group">
                            <textarea rows="2" name="address" required="" placeholder="Address *">{{$item->address}}</textarea>
                        </div>
                        <div class="form-group">
                            <input required="" type="text" name="city" placeholder="City / Town *">
                        </div>
                        <div class="form-group">
                            <input required="" type="text" name="state" placeholder="State / County *">
                        </div>
                        <div class="form-group">
                            <input required="" type="text" name="postcode" placeholder="Postcode / ZIP *">
                        </div>
                        <div class="form-group">
                            <input required="" type="text" name="phone_number" placeholder="Phone *" value="{{$item->phone_number}}">
                        </div>
                        <div class="form-group">
                            <input required="" type="text" name="email" placeholder="Email address *" value="{{$item->email}}">
                        </div>
                        <div class="mb-20">
                            <h5>Additional information</h5>
                        </div>
                        <div class="form-group mb-30">
                            <textarea rows="5" name="additional" placeholder="Order notes"></textarea>
                        </div>
                    @endforeach
                </div>
                <div class="col-md-6">
                    <div class="mb-20">
                        <h4>Your Orders</h4>
                    </div>
                    <div class="order_review">
                        <div class="table-responsive order_table text-center">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Image</th>
                                        <th>Product</th>
                                        <th>Total</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php $total = 0 @endphp
                                    @if($carts)
                                    @foreach ($carts as $item)
                                    @php $total += $item->products->promo_price * $item->product_qty @endphp 
                                    <tr>
                                        <td class="image product-thumbnail"><img src="{{asset('product/'.$item->products->image)}}" alt="#"></td>
                                        <td>
                                            <h5><a href="shop-product-full.html">{{$item->products->title}}</a></h5> <span class="product-qty">{{$item->product_qty}} item</span>
                                        </td>
                                        <td>@currency($item->products->promo_price * $item->product_qty)</td>
                                    </tr>
                                    @endforeach
                                    @endif
                                    <tr>
                                        <th>SubTotal</th>
                                        <td class="product-subtotal" colspan="2">@currency($total)</td>
                                    </tr>
                                    <tr>
                                        <th>Shipping</th>
                                        <td colspan="2"><em>Free Shipping</em></td>
                                    </tr>
                                    <tr>
                                        <th>Total</th>
                                        <td colspan="2" class="product-subtotal"><span class="font-xl text-brand fw-900">@currency($total)</span></td>
                                        <input type="hidden" name="total_payment" value="{{$total}}">
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="bt-1 border-color-1 mt-30 mb-30"></div>
                        <input type="submit" class="btn btn-fill-out btn-block mt-30" value="Place Order | COD">
                        <input type="submit" class="btn mt-10" style="border : none; background :#CC66FF" value="Pay With Razorpay" disabled>
                    </div>
                </div>
            </div>
        </form>
    </div>
</section>
@endsection