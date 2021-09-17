@extends('admin.layouts.master')
@section('title','Order-invoice')

@section('content')

<div class="container-fluid">
                <!-- ============================================================== -->
                <!-- Start Page Content -->
                <!-- ============================================================== -->
                <div class="row">
                    <div class="col-md-12">
                        <div class="card card-body printableArea">
                            <h3><b>INVOICE</b> <span class="pull-right">#0000{{ $orders->id }}</span></h3>
                            <hr>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="pull-left">
                                        <address>
                                            <h3> &nbsp;<b class="text-danger">Smrt Shop</b></h3>
                                            <p class="text-muted m-l-5">House #707 Road #11,
                                                <br/> DOHS,Mirpur
                                               
                                                <br/> Dhaka-1216</p>
                                        </address>
                                    </div>
                                    <div class="pull-right text-right">
                                        <address>
                                            <h3>To,</h3>
                                            
                                            <p class="text-muted m-l-30">{{ $orders->address }}
                                                
                                        
                                            </p>
                                            <p class="m-t-30"><b>Invoice Date :</b> <i class="fa fa-calendar"></i> 23rd Jan 2018</p>
                                            <p><b>Due Date :</b> <i class="fa fa-calendar"></i> {{ $orders->created_at->format('F d, h:s A') }}</p>
                                        </address>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="table-responsive m-t-40" style="clear: both;">
                                        <table class="table table-bordered table-hover">
                                            <thead>
                                                <tr>
                                                    <th class="text-center">#</th>
                                                    <th>Item</th>
                                                    <th class="text-right">Quantity</th>
                                                    <th class="text-right">Price</th>
                                                    <th class="text-right">Total</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @php
                                                    $i=1;
                                                @endphp
                                                @foreach ($orders->orders as $orderProduct)
                            
                                              <tr>
                                                    <td class="text-center">{{$i++}}</td>
                                                    <td>{{ $orderProduct->product_name }}</td>
                                                    <td class="text-right">{{ $orderProduct->product_quantity }} </td>
                                                    <td class="text-right">TK. {{ $orderProduct->product_price }}</td>
                                                    <td class="text-right">TK. {{ $orderProduct->product_quantity * $orderProduct->product_price }} .00</td>
                                                </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="pull-right m-t-30 text-right">
                                       
                                       
                                        <h3><b>Total :</b> TK. {{ $orders->total_amount }}</h3>
                                    </div>
                                    <div class="clearfix"></div>
                                    <hr>
                                   
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- ============================================================== -->
                <!-- End PAge Content -->
                <!-- ============================================================== -->
                <!-- ============================================================== -->
                <!-- Right sidebar -->
                <!-- ============================================================== -->
                <!-- .right-sidebar -->
                <!-- ============================================================== -->
                <!-- End Right sidebar -->
                <!-- ============================================================== -->
            </div>
            <footer class="footer text-center">
                All Rights Reserved by Smart-Shop
            </footer>


@endsection