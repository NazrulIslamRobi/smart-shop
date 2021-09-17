@extends('frontend.layouts.master')

@section('title','Shopping-cart')


@section('content')

<!-- check out -->
<div class="checkout">
	<div class="container">
		<h3>My Shopping Bag</h3>
		<div class="table-responsive checkout-right animated wow slideInUp" data-wow-delay=".5s">
			<table class="timetable_sub">
				<thead>
					<tr>
						<th>Remove</th>
						<th>Product</th>
						<th>price</th>
						<th>Quantity</th>
						<th>Product Name</th>
						<th>Total Price</th>
					</tr>
				</thead>
				@php
					$sum= 0;
				@endphp

                @foreach ($cartProducts as $product )
                    
             
					<tr class="rem1">
						<td class="invert-closeb">
							<div class="rem">
								
								<a href="{{route('delete.cart',$product->rowId)}}" class="close1"></a>
							</div>
							<!-- <script>$(document).ready(function(c) {
								$('.close1').on('click', function(c){
									$('.rem1').fadeOut('fast', function(c){
										$('.rem1').remove();
									});
									});	  
								});
						   </script> -->
						</td>

						<td class="invert-image"><a href=""><img src="{{asset($product->options->images[0]->image_one)}}" alt=" "   class="img-responsive" /></a></td>
						<td class="invert">TK. {{$product->price}}</td>
						<td class="invert">
							 <div class="quantity"> 
								 <form action="{{route('quantity.update',$product->rowId)}}" method="POST">
									 @csrf
									<input style="margin-bottom: 5px;" type="number" name="qty" value="{{$product->qty}}"  min="1" id="">
									<button type="submit">update</button>
								</form>
							</div>
						</td>
						<td class="invert">{{$product->name}}</td>
						<td class="invert">TK .{{$total= $product->price*$product->qty}}</td>
					</tr>
					
					@php
					
					$sum= $sum+$total;


					@endphp
					
                @endforeach
					
					
					
								
							
			</table>
		</div>
		<div class="checkout-left">	
				
				<div class="checkout-right-basket animated wow slideInRight "  data-wow-delay=".5s">
					<a href="{{route('home')}}"><span class="glyphicon glyphicon-menu-left" aria-hidden="true"></span>Back To Shopping</a>
				</div>
				<div class="checkout-left-basket animated wow slideInLeft" style="margin-top: 12px;" data-wow-delay=".5s">
					<h4>Shopping basket</h4>
					<ul>
						<li>Item price <i>-</i> <span>TK. {{ $sum }}</span></li>
						<li>Shipping Cost <i>-</i> <span>TK. {{$shipCost=0;}}</span></li>
						
						<li>Grand Total <i>-</i> <span>TK. {{$sum+$shipCost}}</span></li>
					</ul>
				</div>
				@php
					session()->put('total_amount',$sum+$shipCost);
				@endphp
				
				<div class="clearfix"> </div>

			</div>

			<div class="row">
				<div class="col-md-12">
					<div class="checkout-div" style="margin-top: 12px; float:right" data-wow-delay=".5s">
					@if (Cart::count() > 0)
					<a class="ckeckout-button" href="{{route('checkout')}}"><span class="glyphicon glyphicon-menu-right" aria-hidden="true"></span>Checkout</a>
					@endif
						

					</div>
				</div>
			</div>
				
			

			
	</div>
</div>
					
<!-- //check out -->    
@endsection