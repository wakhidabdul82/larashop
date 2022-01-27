<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Cart;
use Auth;

class CartController extends Controller
{
    public function addProduct(Request $request)
    {
        $product_id = $request->input('product_id');
        $product_qty = $request->input('product_qty');

        if(Auth::check()) {
            $prod_check = Product::where('id', $product_id)->first();

            if ($prod_check) {

                if(Cart::where('product_id', $product_id)->where('user_id', Auth::id())->exists()) {

                    return response()->json(['status' => $prod_check->title." Already on cart"]);

                } else {
                    
                    $cartItem = new Cart();
                    $cartItem->user_id = Auth::id();
                    $cartItem->product_id = $product_id;
                    $cartItem->product_qty = $product_qty;
                    $cartItem->save();
    
                    return response()->json(['status' => $prod_check->title." Added to cart"]);
                }
            }
        }else {
            return response()->json(['status' => "Login to Continue"]);
        }
    }

    public function viewCart()
    {
        $cartItems = Cart::where('user_id', Auth::id())->get();
        return view('cart', compact('cartItems'));
    }

    public function updateProduct(Request $request)
    {
        if(Auth::check()) {
        
            $product_id = $request->input('product_id');
            $product_qty = $request->input('product_qty');
            
            if(Cart::where('product_id', $product_id)->where('user_id', Auth::id())->exists()) {

                $cartItem = Cart::where('product_id', $product_id)->where('user_id', Auth::id())->first();
                $cartItem->user_id = Auth::id();
                $cartItem->product_id = $product_id;
                $cartItem->product_qty = $product_qty;
                $cartItem->save();
                return response()->json(['status' => "Product update successfully"]);
            }

        }else {

            return response()->json(['status' => "Login to Continue"]);

        }
    }


    public function deleteProduct(Request $request)
    {
        if(Auth::check()) {
        
            $product_id = $request->input('product_id');
            if(Cart::where('product_id', $product_id)->where('user_id', Auth::id())->exists()) {

                $cartItem = Cart::where('product_id', $product_id)->where('user_id', Auth::id())->first();
                $cartItem->delete();
                return response()->json(['status' => "Product has been deleted"]);
            }

        }else {

            return response()->json(['status' => "Login to Continue"]);

        }
    }
}
