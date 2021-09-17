<!DOCTYPE html>
<html dir="ltr" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="assets/images/favicon.png">
   
    <!-- Custom CSS -->
    <link href="{{asset('/')}}/admin/dist/css/style.min.css" rel="stylesheet">
 
</head>

<body>
    
    <!-- ============================================================== -->
    <div id="main-wrapper">
    
        <!-- ============================================================== -->
        <div class="page-wrapper">
         
            <!-- ============================================================== -->
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
                                            <p class="m-t-30"><b>Invoice Date :</b> <i class="fa fa-calendar"></i>{{$invoiceDate->format('F d, h:s A')}}</p>
                                            <p><b>Due Date :</b> <i class="fa fa-calendar"></i> {{ $orders->created_at->format('F d, h:s A') }}</p>
                                        </address>
                                    </div>
                                </div>
                                <style>
                                    table, th, td{
                                        border: 1px solid black;
                                    }
                                </style>
                                <div class="col-md-12">
                                    <div class="table-responsive m-t-40" style="clear: both;">
                                        <table class="table">
                                            <thead>
                                                <tr >
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
            <!-- ============================================================== -->
            <!-- End footer -->
            <!-- ============================================================== -->
            <br><br><br>
          <div>
          <hr style="width:30%; margin:left;">
            <p style="margin-left: 20px;">Issued by </p>
            <p>(for Smart Shop)</p>
          </div>
        </div>
        <!-- ============================================================== -->
        <!-- End Page wrapper  -->
        <!-- ============================================================== -->
    </div>
    <!-- ============================================================== -->
    <!-- End Wrapper -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- All Jquery -->
    <!-- ============================================================== -->
    <script src="{{asset('/')}}/admin/assets/libs/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap tether Core JavaScript -->
    <script src="{{asset('/')}}/admin/assets/libs/popper.js/dist/umd/popper.min.js"></script>
    <script src="{{asset('/')}}/admin/assets/libs/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- slimscrollbar scrollbar JavaScript -->
    <script src="{{asset('/')}}/admin/assets/libs/perfect-scrollbar/dist/perfect-scrollbar.jquery.min.js"></script>
    <script src="{{asset('/')}}/admin/assets/extra-libs/sparkline/sparkline.js"></script>
    <!--Wave Effects -->
    <script src="{{asset('/')}}/admin/dist/js/waves.js"></script>
    <!--Menu sidebar -->
    <script src="{{asset('/')}}/admin/dist/js/sidebarmenu.js"></script>
    <!--Custom JavaScript -->
    <script src="{{asset('/')}}/admin/dist/js/custom.min.js"></script>
</body>

</html>