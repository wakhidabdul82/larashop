@extends('layout.master-backend')
@section('title', 'Update Order')
@section('content')
<div class="card">
    <form action="/admin/orders/{{$order->id}}" method="POST">
    {{ csrf_field() }}
    @method('PUT')
    <header class="card-header">
        <div class="row align-items-center">
            <div class="col-lg-6 col-md-6 mb-lg-0 mb-15">
                <span>
                    <i class="material-icons md-calendar_today"></i> <b>{{convert_date($order->created_at)}}</b>
                </span> <br>
                <small class="text-muted" >Invoice ID: {{$order->invoice}}</small>
            </div>
            <div class="col-lg-6 col-md-6 ms-auto text-md-end">
                <select class="form-select d-inline-block mb-lg-0 mb-15 mw-200" name="status" value="{{$order->status}}">
                    <option selected>Change status</option>
                    <option value="Pending">Pending</option>
                    <option value="Payment Accepted">Payment accepted</option>
                    <option value="On Shipping">On shipping</option>
                    <option value="Cancelled">Cancelled</option>
                    <option value="Delivered">Delivered</option>
                    <option value="return">Return</option>
                </select>
                <input type="submit" class="btn btn-primary" value="Save">
                <a class="btn btn-secondary print ms-2" href="javascript:window.print()"><i class="icon material-icons md-print"></i></a>
            </div>
        </div>
    </header> <!-- card-header end// -->
    <div class="card-body">
        <div class="row mb-50 mt-20 order-info-wrap">
            <div class="col-md-4">
                <article class="icontext align-items-start">
                    <span class="icon icon-sm rounded-circle bg-primary-light">
                        <i class="text-primary material-icons md-person"></i>
                    </span>
                    <div class="text">
                        <h6 class="mb-1">Customer</h6>
                        <p class="mb-1">
                            {{$order->first_name}} {{$order->last_name}} <br><br> {{$order->phone_number}}
                        </p>
                    </div>
                </article>
            </div> <!-- col// -->
            <div class="col-md-4">
                <article class="icontext align-items-start">
                    <span class="icon icon-sm rounded-circle bg-primary-light">
                        <i class="text-primary material-icons md-local_shipping"></i>
                    </span>
                    <div class="text">
                        <h6 class="mb-1">Order info</h6>
                        <p class="mb-1">
                            Shipping: Jnt express <br> Pay method: COD <br> Status: 
                            @if ($order->status == 'on shipping')
                            On Shipping
                            @elseif ($order->status == 'pending')
                            Pending
                            @else
                            -  
                            @endif   
                        </p>
                    </div>
                </article>
            </div> <!-- col// -->
            <div class="col-md-4">
                <article class="icontext align-items-start">
                    <span class="icon icon-sm rounded-circle bg-primary-light">
                        <i class="text-primary material-icons md-place"></i>
                    </span>
                    <div class="text">
                        <h6 class="mb-1">Deliver to</h6>
                        <p class="mb-1">
                            City: {{$order->city}}, {{$order->state}} <br>{{$order->address}} <br> Zipcode : {{$order->postcode}}
                        </p>
                    </div>
                </article>
            </div> <!-- col// -->
        </div> <!-- row // -->
        <div class="row">
            <div class="col-lg-7">
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th width="15%">Image</th>
                                <th width="35%">Product</th>
                                <th width="20%">Unit Price</th>
                                <th width="10%">Quantity</th>
                                <th width="20%" class="text-end">Total</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php $total = 0 @endphp
                            @if($order->orderItems)
                            @foreach ($order->orderItems as $item)
                            @php $total += $item->products->promo_price * $item->qty @endphp   
                            <tr>
                                <td>
                                    <img src="{{asset('product/'.$item->products->image)}}" width="40" height="40" class="img-xs" alt="Item">
                                </td>
                                <td> {{$item->products->title}} </td>
                                <td> @currency($item->products->promo_price) </td>
                                <td> {{$item->qty}} </td>
                                <td class="text-end"> @currency($item->products->promo_price * $item->qty) </td>
                            </tr>
                            @endforeach
                            @endif
                            <tr>
                                <td colspan="5">
                                    <article class="float-end">
                                        <dl class="dlist">
                                            <dt>Subtotal:</dt>
                                            <dd>@currency($total)</dd>
                                        </dl>
                                        <dl class="dlist">
                                            <dt>Shipping cost:</dt>
                                            <dd>Free</dd>
                                        </dl>
                                        <dl class="dlist">
                                            <dt>Grand total:</dt>
                                            <dd> <b class="h5">@currency($total)</b> </dd>
                                        </dl>
                                    </article>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div> <!-- table-responsive// -->
            </div> <!-- col// -->
            <div class="col-lg-1"></div>
            <div class="col-lg-4">
                <div class="box shadow-sm bg-light">
                    <h6 class="mb-15">Tracking Number</h6>
                    <input type="text" name="tracking_number" value="{{$order->tracking_number}}" style="width: 100%">
                </div>
                <div class="h-25 pt-4">
                    <div class="mb-3">
                        <label>Notes</label>
                        <textarea class="form-control" name="additional" placeholder="Note from customer" disabled>{{$order->additional}}</textarea>
                    </div>
                </div>
            </div> <!-- col// -->
        </div>
    </div>
    <input type="hidden" name="invoice" value="{{$order->invoice}}">
    <input type="hidden" name="first_name" value="{{$order->first_name}}">
    <input type="hidden" name="last_name" value="{{$order->last_name}}">
    <input type="hidden" name="email" value="{{$order->email}}">
    <input type="hidden" name="phone_number" value="{{$order->phone_number}}">
    <input type="hidden" name="address" value="{{$order->address}}">
    <input type="hidden" name="city" value="{{$order->city}}">
    <input type="hidden" name="state" value="{{$order->state}}">
    <input type="hidden" name="postcode" value="{{$order->postcode}}">
    <input type="hidden" name="total_payment" value="{{$total}}">
    <input type="hidden" name="user_id" value="{{$order->user_id}}">
    </form>
</div>

@endsection