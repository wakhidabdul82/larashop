<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;

class OrderController extends Controller
{
    public function index()
    {
        $orders = Order::where('status','<>','Delivered')->paginate(10);
        return view ('dashboard.order.index', compact('orders'));
    }

    public function edit(Order $order)
    {
        return view('dashboard.order.edit', compact('order'));
    }

    public function update(Request $request, Order $order)
    {
        $request->validate([
            'status' => 'required',
            'tracking_number' => 'required', 
        ]);

        $order->update($request->all());
        return redirect('/admin/orders');
    }
    public function transaction()
    {
        $orders = Order::where('status','Delivered')->paginate(10);
        return view ('dashboard.order.transaction', compact('orders'));
    }
}
