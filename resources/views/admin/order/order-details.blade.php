@extends('admin.layouts.master')
@section('title','Order-details')
@section('content')
<div class="container-fluid" >
   
    <div class="row">
        <div class="col-md-10  col-lg-12 m-auto">

<div class="card">
    <div class="card-title-top">
        <h3 class="text-center">Customer Info for this order</h3>
    </div>
    <table class="table table-bordered">
        <tr>
         <th>Customer Name</th>
         <td>{{ $orders->user->name }}</td>
        </tr>
        <tr>
         <th>Email Address</th>
         <td>{{ $orders->user->email }}</td>
        </tr>
        <tr>
         <th>Phone Number</th>
         <td>{{ $orders->user->phone_number }}</td>
        </tr>
    </table>
</div>

<div class="card">
    <div class="card-title-top">
        <h3 class="text-center">Shipping Info for this order</h3>
    </div>
    <table class="table table-bordered">
        <tr>
         <th>Full Name</th>
         <td>{{ $orders->customer_name }}</td>
        </tr>
        <tr>
         <th>Phone Number</th>
         <td>{{ $orders->customer_phone_number }}</td>
        </tr>
        <tr>
         <th>Email Address</th>
         <td>{{ $orders->customer_email }}</td>
        </tr>
        <tr>
         <th>Address</th>
         <td>{{ $orders->address }}</td>
        </tr>
    </table>
</div>

<div class="card">
    <div class="card-title-top">
        <h3 class="text-center">Payment Info for this order</h3>
    </div>
    <table class="table table-bordered">
        <tr>
         <th>Payment Type</th>
         <td>{{ $orders->payment->payment_type }}</td>
        </tr>
        <tr>
         <th>Payment Status</th>
         <td>{{ $orders->payment->payment_status }}</td>
        </tr>
       
    </table>
</div>
        <div class="card text-center" >
        <div class="card-title-top">
        <h3 class="text-center">Product Info for this order</h3>
        </div>
            <table class="table table-responsive table-hover table-bordered " >
                <thead class="thead-dark">
                    <th>Sl No</th>
                    <th>Product Id</th>
                    <th>Product Name</th>
                    <th>Product Quantity</th>
                    <th>Product Price</th>
                    <th>Total Price</th>
                   
                </thead>
              <tbody> 
                  @php
                      $i=1;
                  @endphp     
       @foreach ($orders->orders as $orderProduct)
           
      
            <tr>

              <td>{{ $i++ }}</td>
              <td>{{$orderProduct->product_id}}</td>
              <td>{{$orderProduct->product_name}}</td>
              <td>{{$orderProduct->product_quantity}}</td>
              <td>TK. {{$orderProduct->product_price}}.00</td>
              <td>TK. {{$orderProduct->product_quantity * $orderProduct->product_price}}.00</td>
      
              </tr> 
         @endforeach 
              <tr>
                  <th>Order Total</th>
                  <th></th>
                  <th></th>
                  <th></th>
                  <th></th>
                  <th>TK. {{$orders->total_amount}}</th>
              </tr>   
            </tbody>
        

        </table>
        </div>



        </div>
    </div>
</div>
@endsection