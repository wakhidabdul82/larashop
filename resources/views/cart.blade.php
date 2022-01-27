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
                                        <input type="number" min="1" value="{{ $item->product_qty }}" class="form-control qty_product">
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
            </div>
        </div>
    </div>
</section>
@endsection


