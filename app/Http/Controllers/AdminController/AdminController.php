<?php

namespace App\Http\Controllers\AdminController;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{

 public function showLoginForm(){

    return view('admin.login');
 }


   public function index()
   {
       $admin['admins']=Admin::all();
       $admin['totalShop']= Product::where('product_status',1)->get();
       $admin['totalOrder']= Order::all();
       $admin['pendingOrder']= Order::where('order_status','pending')->get();
       return view('admin.dashboard',$admin);
   }


  
   
   
}
