<?php

namespace App\Http\Controllers;

use App\Models\Homepage;
use App\Models\Product;
use App\Models\Category;
use App\Models\Brand;
use Illuminate\Http\Request;

class HomepageController extends Controller
{
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function welcome()
    {
        $products = Product::with('brands', 'categories')->get();
        return view('homepage.welcome',compact('products'));
    }

    public function shop()
    {
        $products = Product::with('brands', 'categories')->orderBy('id', 'DESC')->get();
        return view('homepage.shop',compact('products'));
    }
    
     public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Homepage  $homepage
     * @return \Illuminate\Http\Response
     */
    public function show(Homepage $homepage)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Homepage  $homepage
     * @return \Illuminate\Http\Response
     */
    public function edit(Homepage $homepage)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Homepage  $homepage
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Homepage $homepage)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Homepage  $homepage
     * @return \Illuminate\Http\Response
     */
    public function destroy(Homepage $homepage)
    {
        //
    }
}
