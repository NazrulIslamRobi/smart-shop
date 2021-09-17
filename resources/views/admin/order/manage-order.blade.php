@extends('admin.layouts.master')
@section('title','Manage-order')
@section('content')
<div class="container-fluid" >
    <div>
        <h2>Order Table</h2>
    </div>
    <div class="row">
        <div class="col-md-10  col-lg-12 m-auto">
            <table class="table table-responsive table-hover table-bordered">
                <thead class="thead-dark">
                    <th>Order No</th>
                    <th>Customer Name</th>
                    <th>Total Order</th>
                    <th>Order Date</th>
                    <th>Order Status</th>
                    <th>Payment Type</th>
                    <th>Payment Status</th>
                    <th>Action</th>
               
                </thead>
              <tbody>
                 
        @foreach ($orders as $order)
        <tr>

              <td>{{$order->id}}</td>
              <td>{{$order->customer_name}}</td>
              <td>{{$order->total_amount}}</td>
              <td>{{$order->created_at->format('F d, h:s A')}}</td>
              <td>{{$order->order_status}}</td>
              <td>{{$order->payment->payment_type}}</td>
              <td>{{$order->payment->payment_status}}</td>
             
              <td>
              <a href="{{route('admin.order.details',$order->id)}}" class="btn btn-info mt-1"><span> <i class="fas fa-info-circle"></i> </span></a>
              <a href="{{route('admin.order.invoice',$order->id)}}" class="btn btn-warning mt-1"><span> <i class="  fas fa-search-plus"></i> </span></a>
            
            <a href="{{route('admin.invoice.download',$order->id)}}" class="btn btn-success mt-1"><span> <i class=" fas fa-arrow-circle-down"></i> </span></a>
            <a href="" class="btn btn-success mt-1"><span> <i class="far fa-edit"></i> </span></a>
            <form id="delCategory" class="d-inline"  action="" method="POST">
                        @csrf
                        @method('DELETE')
                           <button class="btn btn-danger mt-1" type="submit" onclick="return confirm('are you sure')"><i class="far fa-trash-alt"></i></button>
                       </form>
              
              </td>
              
              @endforeach    
              </tr>     
              </tbody>

            </table>
        </div>
    </div>
</div>
@endsection