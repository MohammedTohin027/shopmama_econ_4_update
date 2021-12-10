<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Product;
use Gloudemans\Shoppingcart\Facades\Cart;

class CartController extends Controller
{
    //  add To Cart Product
    public function addToCart(Request $request, $id){
        $product = Product::findOrFail($id);
        if ($product->discount_price == null) {
            $price = $product->selling_price;
        } else {
            $price = $product->discount_price;
        }
        Cart::add([
            'id' => $id,
            'name' => $product->product_name_en,
            'qty' => $request->quantity,
            'price' => $price,
            'weight' => 1,
            'options' => [
                'size' => $request->size,
                'color' => $request->color,
                'image' => $product->product_thambnail,
            ]
        ]);
        return response()->json(['success' => 'Product Successfully Added in your Cart']);
    }

    //MiniCart Product View
    public function miniCartProductView(){
        $carts = Cart::content();
        $cartQty = Cart::count();
        $cartTotal = Cart::total();
        return response()->json(array(
           'carts' => $carts,
           'cartQty' => $cartQty,
           'cartTotal' => round($cartTotal),
        ));
    }

    //  mini Cart Remove
    public function miniCartRemove($rowId){
        Cart::remove($rowId);
        return response()->json(['success' => 'Product Remove From MiniCart']);
    }

    //  Cart Page View
    public function cartPageView(){
        return view('frontend.cart-view');
    }

    //  Get Cart Product
    public function getCartProduct(){
        $carts = Cart::content();
        $cartQty = Cart::count();
        $cartTotal = Cart::total();
        return response()->json(array(
            'carts' => $carts,
            'cartQty' => $cartQty,
            'cartTotal' => $cartTotal,
        ));
    }

    //  cart Remove
    public function cartRemove($rowId){
        Cart::remove($rowId);
        return response()->json(['success' => 'Cart Product Removed Successfully']);
    }


    //  Cart Product Increment By Id
    public function CartProductIncrementById($rowId){
        $row = Cart::get($rowId);
        Cart::update($rowId, $row->qty+1);
        return response()->json(['success' => 'Cart Product Increment Successfully']);
    }

    //  cartDecrement
    public function cartDecrement($id){
        $row = Cart::get($id);
        if ($row->qty > 1) {
            Cart::update($id, $row->qty - 1);
            return response()->json(['success' => 'Cart Product Decrement Successfully']);
        }
        else {
            return response()->json(['error' => 'Cart Product have must be one']);
        }
    }


}
