<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;

class ShopController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function welcome()
    {
        $products = Product::with('categories', 'brands')->get();
        return view('shop.welcome', compact('products'));
    }
    
    
    public function index(Request $request)
    {
        $products = Product::with('categories', 'brands')->get();
        $products = $products->toQuery();

        if($request->category) {
            $products = $products->whereHas('categories', function ($q) use ($request) {
                $q->where('slug', $request->category);
            });
        }
        else {
            $products->featured()->inRandomOrder()->take(12);
        }

        $products = $products->paginate(9);

        $categories = Category::all();

        $categoryName = optional(Category::findBySlug($request->category))->name ?? 'Featured';

        return view('shop.shop', compact('products', 'categories', 'categoryName'));
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        $mightLike = Product::where('slug', '!=', $product->slug)->mightLike()->get();
        $categories = Category::all();
        return view('shop.product', compact('product', 'mightLike', 'categories'));
    }
}
