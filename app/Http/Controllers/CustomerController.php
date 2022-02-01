<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Category;
use App\Models\Order;
use App\Models\OrderItem;
use File;

class CustomerController extends Controller
{
    
     public function index()
    {
        $orders = Order::where('user_id', Auth::id())->get();
        $customer = Customer::where('user_id', Auth::id())->first();
        return view('customer.index', compact('customer', 'orders'));
    }

    
    public function create(Request $request)
    {
        return view('customer.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'phone_number' => 'required',
            'address' => 'required',
            'birthday' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $input = $request->all();
        if ($image = $request->file('image')) {
            $destinationPath = 'customer/';
            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $input['image'] = "$profileImage";
        }
        
        Customer::create($input);
        return redirect('/dashboard');
    }

    
    public function update(Request $request, Customer $customer)
    {
        $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'phone_number' => 'required',
            'address' => 'required',
            'birthday' => 'required',
        ]);

        $input = $request->all();

        if ($image = $request->file('image')) {
            $destinationPath = 'customer/';
            File::delete($destinationPath . $customer->image);
            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $input['image'] = "$profileImage";
        }else{
            unset($input['image']);
        }

        $customer->update($input);
        return redirect('/dashboard');
    }

    public function vieworder($id)
    {
        $categories = Category::all();
        $orders = Order::where('id', $id)->where('user_id', Auth::id())->first();
        return view('customer.vieworder', compact('orders', 'categories'));
    }
}
