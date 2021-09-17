@extends('frontend.layouts.master')

@section('title','Checkout-shipping')


@section('content')

<!-- check out -->
<div style="margin-top: 50px; margin-bottom:50px;">
	<div class="container">
		<div class="well">
		<h3>Dear,{{ auth()->user()->name }}  plaease give us your shipping information to complete your valuable order.</h3>
		</div>
				<div class="" role="document">
					<div class="modal-content modal-info">
						
						<div class="modal-body modal-spa">
							<div class="login-grids">
								<div class="login">
									<div class="shipping-info ">
										<h3 style="color:orange;">Shipping info goes here</h3>

									@if ($errors->any())
										<div class="alert alert-danger" style="margin-top: 10px;">
											@foreach ($errors->all() as $error)
												<ul>
													<li>{{$error}}</li>
												</ul>
											@endforeach
										</div>
									@endif
									@if (session()->has('message'))
									<div class="alert alert-success">
										
												<span>{{session('message')}}</span>
											
									</div>
										
									@endif
										<form  action="{{route('shipping.create')}}" method="POST">
											@csrf
										<div class="shipping-input">
												<label for="name">Name:</label>
												<input type="text" class="form-control" name="customer_name" value="{{ auth()->user()->name}}"  required="">	
											</div>

											<div class="shipping-input">
												<label for="name">Email:</label>
												<input type="email" class="form-control"  name="customer_email" value="{{ auth()->user()->email}}"  >	
											</div>
                                            <div class="shipping-input">
												<label for="name">Phone Number:</label>
												<input type="text" class="form-control"  name="customer_phone_number" value="{{ auth()->user()->phone_number}}"  required="">	
											</div>
                                            <div class="shipping-input">
												<label for="name">Address:</label><br>
												<textarea class="form-control" name="address" id="" cols="30" rows="5" style="resize: none;"></textarea>	
											</div>

											@if ($cart === 0)
												<p>please add your product to cart</p>

											@else
											<div class="shipping-input">
												<input class="ship-btn" type="submit" value="SAVE SHIPPING" >
											</div>
											@endif
										
											
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