<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Product;

use App\Cart;

use Session;

use App\Http\Requests;

class productController extends Controller
{
    public function getIndex(){
        $products = Product::all();
        return view('shop.index', ['products' => $products]);
    }
    public function getAddToCart(Request $request , $id){
        $product = Product::find($id);
        $oldCard = Session::has('cart') ? Session::get('cart') : null;
        $cart = new Cart($oldCard);
        $cart->add($product, $product->id);
        $request->session()->put('cart', $cart);
        return redirect()->route('product.all');
    }
    public function getCart(){
        if (!Session::has('cart')) {
            return view('shop.shopping-cart');
        }
        $oldCart = Session::get('cart');
        $cart = new Cart($oldCart);
        return view('shop.shopping-cart',['products'=>$cart->items, 'totalPrice'=>$cart->totalPrice]);

    }
}
