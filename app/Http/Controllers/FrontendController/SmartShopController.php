<?php

namespace App\Http\Controllers\FrontendController;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class SmartShopController extends Controller
{
    public function index(){
    
        $data['products'] = cache('products',function(){
           return Product::with('images')->where('product_status',1)->orderBy('id','desc')->take(12)->get();
            
        });
        return view('frontend.home',$data);
        
    }

   public function categoryProduct($id){

     $data['products']= Product::with('category','images')->where('category_id',$id)->where('product_status',1)->orderBy('id','desc')->get();
     $data['categories'] = Category::select('id','category_name','slug_name')->where('publication_status',1)->get();

     return view('frontend.category.categoryProduct',$data);
     
   }

   public function productDetails($slug){
       $data['productDetails']= Product::with('images')->select('id','title','slug','description','in_stok','quantity','regular_price','sale_price')->where('slug',$slug)->first();
    
    return view('frontend.product.productDetails',$data);
   }
  


    public function contact(){
        return view('frontend.contact');

    }
    
}
