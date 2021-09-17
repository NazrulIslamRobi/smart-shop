<?php

namespace App\Http\Controllers\FrontendController;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;


class CartController extends Controller
{
    public function addCart(Request $request){
       $product= Product::with('images')->where('id',$request->product_id)->first();


    Cart::add([
        'id'=> $product->id,
        'name'=> $product->title,
        'qty'=> $request->qty,
        'price'=> $product->sale_price,
        'options'=>[
            'images'=> $product->images,
        ]
    ]);

    return redirect()->route('show.cart');
       
        
    }

    public function showCart(){
        $data['cartProducts']= Cart::content();
        return view('frontend.cart.showCart',$data);
    }

    public function deleteCart($id){
        Cart::remove($id);
        return redirect()->route('show.cart');
    }

    
    public function updateQty(Request $request, $id){

        Cart::update($id,$request->qty);

        return redirect()->route('show.cart');
    }
    

    public function cartDestroy(){
        
        Cart::destroy();
        return redirect()->route('show.cart');
    }

  
}
