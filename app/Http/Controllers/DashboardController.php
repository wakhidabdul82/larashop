<?php

namespace App\Http\Controllers;

use App\Models\Dashboard;
use App\Models\Order;
use App\Models\Product;
use App\Models\Category;
use App\Models\Customer;
use App\Models\OrderItem;
use Illuminate\Http\Request;
use DB;

class DashboardController extends Controller
{
    
    public function index()
    {
        $revenue = Order::where('status','Delivered')->sum('total_payment');
        $current_order = Order::where('status','<>','Delivered')->count('id');
        $count_product = Product::count();
        $count_category = Category::count();
        $month_revenue = Order::where('status', 'Delivered')->whereMonth('updated_at',date('m'))->sum('total_payment');

        $label_line = ['Delivered', 'Proses'];
        $data_line = [];

        foreach ($label_line as $key => $value) {
            $data_line[$key]['label'] = $label_line[$key];
            $data_line[$key]['tension'] = 0.3;
            $data_line[$key]['fill'] = true;
            $data_line[$key]['backgroundColor'] = $key == 0 ? 'rgba(44, 120, 220, 0.2)' : 'rgba(380, 200, 230, 0.2)';
            $data_line[$key]['borderColor'] = $key == 0 ? 'rgba(44, 120, 220)' : 'rgba(380, 200, 230)';
            $data_month = [];

            foreach (range(1, 12) as $month) {
                if ($key == 0) {
                    $data_month[] = Order::select(DB::raw("COUNT(*) as total"))->where('status','Delivered')->whereMonth('updated_at', $month)->first()->total;
                }else {
                    $data_month[] = Order::select(DB::raw("COUNT(*) as total"))->where('status','<>','Delivered')->whereMonth('created_at', $month)->first()->total;
                }  
            }

            $data_line[$key]['data'] = $data_month;
        }

        $orderItems = OrderItem::orderBy('qty','DESC')->paginate(3);

        $realorders = Order::orderBy('created_at', 'DESC')->paginate(5);

        return view('dashboard.home', compact('revenue','current_order','count_product','count_category','month_revenue','label_line','data_line','orderItems','realorders'));
    }

    public function welcome()
    {
        return view('dashboard.welcome');
    }

    public function customer()
    {
        $customers = Customer::all();
        return view('dashboard.customer', compact('customers'));
    }

    
}
