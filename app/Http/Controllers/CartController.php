<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Models\Product;
use App\Models\myCart;
use Auth;
use Session;

class CartController extends Controller
{
    public function __construct(){
        $this->middleware('auth'); //require login before access controller
    }

    public function addcart(){
        $r=request();
        $add=myCart::create([
            'quantity'=>$r->quantity,
            'orderID'=>'1',
            'productID'=>$r->id,
            'dateAdd'=>'',
            'userID'=>Auth::id(),
        ]);
        return redirect()->route('myCart');
    }

    public function view(){
        $cart=DB::table('my_carts')->leftjoin('products','products.id','=','my_carts.productId')
        ->select('my_carts.quantity as cartQty','my_carts.id as cid','products.*')
        ->where('my_carts.orderID','=','1')
        ->where('my_carts.userID','=',Auth::id())
        ->get();
        (new CartController)->cartItem();
        return view('myCart')->with('cart',$cart);
    }

    public function cartItem(){
        $cartItem=0;
        $noItem=DB::table('my_carts')->leftjoin('products','products.id','=','my_carts.productId')
        ->select(DB::raw('COUNT(*) as count_item'))
        ->where('my_carts.userID','=',Auth::id())
        ->groupBy('my_carts.userID')
        ->first();
        if($noItem){
            $cartItem=$noItem->count_item;
        }
        Session()->put('cartItem',$cartItem);
    }

    public function removeCartItem($id){
        $removeCartItem = myCart::find($id);
        $removeCartItem->delete();
        // After removing the item, you can redirect back to the cart or any other page
        return redirect()->route('myCart')->with('success', 'Item removed from cart successfully');
    }
    
}
