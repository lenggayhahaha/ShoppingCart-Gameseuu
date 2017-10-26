<?php

namespace App\Http\Controllers;
use App\Product;
use App\CartItem;
use DB;
use Auth;
use Session;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function addToCart(Request $request) {
        $product_id = $request -> product_id;
    	$customer_id = $request -> customer_id;
    	$product_name = $request -> product_name;
    	$product_price = $request -> product_price;
        $product_quantity = $request -> product_quantity;
        $imagePath = $request -> imagePath;

        $checker = DB::table('cart_items')->where([
                ['product_id', '=', $product_id],
                ['customer_id', '=', $customer_id],
            ]) -> count();

        if ($checker == 1) {
            $existed = DB::table('cart_items')->where([
                ['product_id', '=', $product_id],
                ['customer_id', '=', $customer_id],
            ]) -> increment('product_quantity');

            Session::flash('status', 'Product is in the cart already. Quantity increased by 1.');

            return redirect ('/home');    
        } else {
        	$cart = new CartItem();
            $cart -> product_id = $product_id;
        	$cart -> customer_id = $customer_id;
        	$cart -> product_name = $product_name;
        	$cart -> product_price = $product_price;
            $cart -> product_quantity = $product_quantity;
            $cart -> imagePath = $imagePath;
        	$cart -> save();

        	return redirect ('/home');
        }
    }

    public function showCart(Request $request) {
        $customer_id = Auth::user()->id;
        
        $carts = DB::table('cart_items')->where('customer_id', $customer_id)->get();
        $count_cart = DB::table('cart_items') -> where('customer_id', '=', $customer_id) -> count();

        return view ('cart-items',[
            'carts' => $carts,
            'count_cart' => $count_cart
            ]);
    }

    public function deleteToCart(Request $request) {
        $product_id = $request -> product_id;
        $customer_id = Auth::user()->id;

        $delete = DB::table('cart_items')->where([
            ['product_id', '=', $product_id],
            ['customer_id', '=', $customer_id],
        ])->delete();

        return redirect ('/home/show');
    }

    public function updateQuantity(Request $request) {
        $customer_id = Auth::user()->id;
        $product_id = $request -> product_id;
        $product_quantity = $request -> product_quantity;

        $update = DB::table('cart_items')->where([
            ['product_id', '=', $product_id],
            ['customer_id', '=', $customer_id],
        ])->update(['product_quantity' => $product_quantity]);


        return redirect ('/home/show');
    }
}
