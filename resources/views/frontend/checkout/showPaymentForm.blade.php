@extends('frontend.layouts.master')

@section('title','Checkout-payment')


@section('content')

<!-- check out -->
<div style="margin-top: 50px; margin-bottom:50px;">
	<div class="container">
		<div class="well">
		<h3 class="text-center">Dear,{{ auth()->user()->name }}  plaease select your payment method.</h3>
		</div>
				<div class="" role="document">
					<div class="modal-content modal-info">
						
						<div class="modal-body modal-spa">
							<div class="login-grids">
								<div class="login">
									<div class="shipping-info ">
										<h3  style="color:orange;"></h3>

									@if ($errors->any())
										<div class="alert alert-danger" style="margin-top: 10px; text-align: center;">
										<span>{{$errors->first()}}</span>
										</div>
									@endif
									
                                    <form action="{{route('payment')}}" method="POST">
                                        @csrf
										<table class="table table-bordered">
                                            <tr>
                                                <th>Cash On Delivery</th>
                                                <td><input type="radio" name="payment_type" id="" value="cash"> Cash On Delivery</td>
                                            </tr>
                                            <tr>
                                                <th>Paypal</th>
                                                <td><input type="radio" name="payment_type" id="" value="paypal"> Paypal</td>
                                            </tr>
                                            <tr>
                                                <th>Bkash</th>
                                                <td><input type="radio" name="payment_type" id="" value="bkash"> Bkash</td>
                                            </tr>
                                            <tr>
                                          <th></th>
                                                <td><input class="ship-btn" type="submit" value="Confirm Order"></td>
                                            </tr>
                                        </table>
                                     </form>
									</div>
									
									<div class="clearfix"></div>
								</div>
								
							</div>
						</div>
					</div>
				</div>
			</div>
<!-- //login -->
			
				
			

			
	</div>

					
<!-- //check out -->    
@endsection