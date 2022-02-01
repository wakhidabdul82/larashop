<?php
use App\Models\Cart;
use Illuminate\Support\Facades\DB;

    function shopCart() {

        $shopCart = Cart::where('user_id', Auth::id())->count();
  
        return $shopCart; 
    }

    function shopItem() {

        $shopItem = Cart::where('user_id', Auth::id())->get();
  
        return $shopItem; 
    }

    function convert_date($value) {
        return date('j F Y', strtotime($value));
    }

?>