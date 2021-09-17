<?php

namespace App\Http\Controllers\AdminController;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use PDF;


class OrderController extends Controller
{
  public function index(){

    $data['orders']= Order::with('payment','orders')->get();
   
      
    return view('admin.order.manage-order',$data);

  }


  public function orderDetails($id){
    $data['orders']= Order::with('user','payment','orders')->where('id',$id)->first();

    return view('admin.order.order-details',$data);
  }


  public function orderInvoice($id){
    $data['orders']= Order::with('orders')->where('id',$id)->first();
    
    return view('admin.order.order-invoice',$data);
  }


  public function InvoiceDownload($id){

    $data['invoiceDate']= Carbon::now();

    $data['orders']= Order::with('orders')->where('id',$id)->first();

    $pdf= PDF::loadView('admin.order.order-invoice-download', $data)->setOptions(['defaultFont'=>'sans-serif']);
    
    return $pdf->stream('invoice.pdf');
  }





}
