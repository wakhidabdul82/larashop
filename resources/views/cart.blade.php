@extends('layout.master-frontend')

@section('content')
    
<div class="page-header breadcrumb-wrap">
    <div class="container">
        <div class="breadcrumb">
            <a href="index.html" rel="nofollow">Home</a>
            <span></span> Shop
            <span></span> Your Cart
        </div>
    </div>
</div>
<section class="mt-50 mb-50">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="table-responsive">
                    <table class="table shopping-summery text-center clean">
                        <thead>
                            <tr class="main-heading">
                                <th style="width: 10%" scope="col">Image</th>
                                <th style="width: 40%" scope="col">Name</th>
                                <th style="width: 15%" scope="col">Price</th>
                                <th style="width: 8%" scope="col">Quantity</th>
                                <th style="width: 17%" scope="col">Subtotal</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php $total = 0 @endphp
                            @if($cartItems)
                            @foreach ($cartItems as $key => $item)
                            @php $total += $item->products->promo_price * $item->product_qty @endphp 
                            <tr class="product_data">
                                <td class="image product-thumbnail"><img src="{{asset('product/'.$item->products->image)}}" alt="#"></td>
                                <td class="product-des product-name">
                                    <h5 class="product-name"><a href="shop-product-right.html">{{$item->products->title}}</a></h5>
                                    <p class="font-xs">{{Str::limit($item->products->description, 90)}}</p>
                                </td>
                                <td class="price" data-title="Price"><span>@currency($item->products->promo_price)</span></td>
                                <input type="hidden" class="product_id" value="{{$item->product_id}}">
                                <td class="text-center" data-title="Stock">
                                    <div>
                                        @if ($item->products->stock >= $item->product_qty)  
                                        <input type="number" min="1" max="{{$item->products->stock}}" value="{{ $item->product_qty }}" class="form-control qty_product">
                                        @else
                                        <p class="text-danger text-sm">Out of Stock</p>
                                        @endif
                                    </div>
                                </td>
                                <td class="text-right" data-title="Cart">
                                    <span>@currency($item->products->promo_price * $item->product_qty) </span>
                                </td>
                                <td>
                                    <button class="btn btn-info btn-sm mb-2 update-cart-item">Update</button>
                                    <button class="btn btn-google btn-sm delete-cart-item">Remove</button>
                                </td>
                            </tr>
                            @endforeach
                            @endif
                        </tbody>
                    </table>
                </div>
                <div class="row justify-content-end mt-15">
                    <div class="col-5 cart-action text-end">
                        <div class="heading_s1 mb-3">
                            <h4>Cart Totals</h4>
                        </div>
                        <div class="table-responsive">
                            <table class="table">
                                <tbody>
                                    <tr>
                                        <td class="cart_total_label" style="width:40%">Cart Subtotal</td>
                                        <td class="cart_total_amount"><span class="font-lg fw-900 text-brand">@currency($total)</span></td>
                                    </tr>
                                    <tr>
                                        <td class="cart_total_label" style="width:40%">Shipping</td>
                                        <td class="cart_total_amount"> <i class="ti-gift mr-5"></i> Free forever</td>
                                    </tr>
                                    <tr>
                                        <td class="cart_total_label" style="width:40%">Total</td>
                                        <td class="cart_total_amount"><strong><span class="font-xl fw-900 text-brand">@currency($total)</span></strong></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="cart-action text-end">
                    <a href="/shop" class="btn mr-10 mb-sm-15"><i class="fi-rs-shopping-bag mr-10"></i>Continue Shopping</a>
                    <a href="/checkout" class="btn "><i class="fi-rs-shuffle mr-10"></i>Checkout</a>
                </div
            </div>
        </div>
    </div>
</section>
@endsection


