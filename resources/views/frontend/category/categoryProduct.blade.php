
@extends('frontend.layouts.master')

@section('title','Category-product')
@section('content')

<div class="page-head">
	<div class="container">

		<h3>{{ $products[0]->category->category_name }}</h3>
		
	</div>
</div>
<!-- //banner -->
<!-- mens -->
<div class="men-wear">
	<div class="container">
		<div class="col-md-4 products-left">
        <div class="filter-price">

					<ul class="dropdown-menu6">
						<li>                
							<div id="slider-range"></div>							
							
						</li>			
					</ul>
							<!---->
							<script type='text/javascript'>//<![CDATA[ 
							$(window).load(function(){
							 $( "#slider-range" ).slider({
										range: true,
										min: 0,
										max: 9000,
										values: [ 1000, 7000 ],
										slide: function( event, ui ) {  $( "#amount" ).val( "$" + ui.values[ 0 ] + " - $" + ui.values[ 1 ] );
										}
							 });
							$( "#amount" ).val( "$" + $( "#slider-range" ).slider( "values", 0 ) + " - $" + $( "#slider-range" ).slider( "values", 1 ) );

							});//]]>  

							</script>
						<script type="text/javascript" src="{{asset('/')}}/frontend/js/jquery-ui.js"></script>
					 <!---->
			</div>
			

			@include('frontend.layouts.CategorySidebar')
			
			<div class="clearfix"></div>
		</div>
		<div class="col-md-8 products-right">
			<h5>Product Compare(0)</h5>
			<div class="sort-grid">
				<div class="sorting">
					<h6>Sort By</h6>
					<select id="country1" onchange="change_country(this.value)" class="frm-field required sect">
						<option value="null">Default</option>
						<option value="null">Name(A - Z)</option> 
						<option value="null">Name(Z - A)</option>
						<option value="null">Price(High - Low)</option>
						<option value="null">Price(Low - High)</option>	
						<option value="null">Model(A - Z)</option>
						<option value="null">Model(Z - A)</option>					
					</select>
					<div class="clearfix"></div>
				</div>
				<div class="sorting">
					<h6>Showing</h6>
					<select id="country2" onchange="change_country(this.value)" class="frm-field required sect">
						<option value="null">7</option>
						<option value="null">14</option> 
						<option value="null">28</option>					
						<option value="null">35</option>								
					</select>
					<div class="clearfix"></div>
				</div>
				<div class="clearfix"></div>
			</div>
			<div class="men-wear-top ">
				<script src="{{asset('/')}}/frontend/js/responsiveslides.min.js"></script>
				<script>
						// You can also use "$(window).load(function() {"
						$(function () {
						 // Slideshow 4
						$("#slider3").responsiveSlides({
							auto: true,
							pager: true,
							nav: false,
							speed: 500,
							namespace: "callbacks",
							before: function () {
						$('.events').append("<li>before event fired.</li>");
						},
						after: function () {
							$('.events').append("<li>after event fired.</li>");
							}
							});
						});
				</script>
				<div  id="top" class="callbacks_container">
					<ul class="rslides" id="slider3">
						<li>
							<img class="img-responsive" src="{{asset('/')}}/frontend/images/men1.jpg" alt=" "/>
						</li>
						<li>
							<img class="img-responsive" src="{{asset('/')}}/frontend/images/men2.jpg" alt=" "/>
						</li>
						<li>
							<img class="img-responsive" src="{{asset('/')}}/frontend/images/men1.jpg" alt=" "/>
						</li>
						<li>
							<img class="img-responsive" src="{{asset('/')}}/frontend/images/men2.jpg" alt=" "/>
						</li>
					</ul>
				</div>
				<div class="clearfix"></div>
			</div>
			@foreach($products as $product)
				<div class="col-md-4 product-men no-pad-men ">
					<div class="men-pro-item simpleCart_shelfItem" style="margin-top: 60px;">
						<div class="men-thumb-item">
							<img src="{{asset( $product->images[0]->image_one) }}" style="height: 220px;" alt="" class="pro-image-front">
							<img src="{{ asset( $product->images[0]->image_two)}}"style="height: 220px;" alt="" class="pro-image-back">
										<div class="men-cart-pro">
											<div class="inner-men-cart-pro">
												<a href="{{ route('product.details',$product->slug) }}" class="link-product-add-cart">Quick View</a>
											</div>
										</div>
										<span class="product-new-top">New</span>
										
						</div>
						<div class="item-info-product ">
									<h4><a href="{{ route('product.details',$product->slug) }}">{{ $product->title }}</a></h4>
									<div class="info-product-price">
										@if ($product->sale_price == null)
											<span class="item_price">TK. {{ $product->regular_price }}</span>
										@else
										<span class="item_price">TK. {{ $product->sale_price }}</span>
										<del>TK .{{ $product->regular_price }}</del>
										@endif
										
											
										
										
									</div>
									<a href="#" class="item_add single-item hvr-outline-out button2">Add to cart</a>									
						</div>
					</div>
				</div>
				@endforeach
		
			<div class="clearfix"></div>
		</div>
	</div>
</div>	
<!-- //mens -->
<!-- //product-nav -->

@endsection