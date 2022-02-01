<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customer;
use App\Models\Cart;
use App\Models\Product;
use App\Models\Order;
use App\Models\OrderItem;
use Auth;

class CheckoutController extends Controller
{
    
    public function index()
    {
        $customers = Customer::where('user_id', Auth::id())->get();
        $old_carts = Cart::where('user_id', Auth::id())->get();
        foreach($old_carts as $item) {
            if(!Product::where('id', $item->product_id)->where('stock', '>=', $item->product_qty)->exists()) {
                $removeItem = Cart::where('user_id', Auth::id())->where('product_qty', $item->product_qty)->first();
                $removeItem->delete();
            }
        }
        $carts = Cart::where('user_id', Auth::id())->get();

        return view('checkout', compact('customers', 'carts'));
    }

    
    public function placeorder(Request $request)
    {
        $order = new Order;
        $order->invoice = 'INV - '.rand(111111,999999);
        $order->first_name = $request->input('first_name');
        $order->last_name = $request->input('last_name');
        $order->email = $request->input('email');
        $order->phone_number = $request->input('phone_number');
        $order->address = $request->input('address');
        $order->city = $request->input('city');
        $order->state = $request->input('state');
        $order->postcode = $request->input('postcode');
        $order->user_id = $request->input('user_id');
        $order->total_payment = $request->input('total_payment');
        $order->additional = $request->input('additional');
        $order->save();

        $carts = Cart::where('user_id', Auth::id())->get();
        foreach ($carts as $item) {
            
            OrderItem::create([
                'order_id' => $order->id,
                'product_id' => $item->product_id,
                'qty' => $item->product_qty,
                'price' => $item->products->promo_price,
            ]);

            $product = Product::where('id', $item->product_id)->first();
            $product->stock = $product->stock - $item->product_qty;
            $product->update();
        }

        $carts = Cart::where('user_id', Auth::id())->get();
        Cart::destroy($carts);

        return redirect('/order-confirm')->with('status', "Add Order Succesfully.");

    }

    public function orderconfirm(Request $request)
    {
        return view ('order-confirm');
    }
    
}
