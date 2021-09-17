
<!-- header -->
<div class="header">
	<div class="container">
		<ul>
			<li><span class="glyphicon glyphicon-time" aria-hidden="true"></span>Free and Fast Delivery</li>
			<li><span class="glyphicon glyphicon-shopping-cart" aria-hidden="true"></span>Free shipping On all orders</li>
			<li><span class="glyphicon glyphicon-envelope" aria-hidden="true"></span><a href="mailto:info@example.com">info@example.com</a></li>
		</ul>
	</div>
</div>
<!-- //header -->
<!-- header-bot -->
<div class="header-bot">
	<div class="container">
		<div class="col-md-3 header-left">
			<h1><a href="index.html"><img src="{{asset('/')}}/frontend/images/logo3.jpg"></a></h1>
		</div>
		<div class="col-md-6 header-middle">
			<form>
				<div class="search">
					<input type="search" value="Search" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Search';}" required="">
				</div>
				<div class="section_room">
					<select id="country" onchange="change_country(this.value)" class="frm-field required">
						<option value="null">All categories</option>
				
					</select>
				</div>
				<div class="sear-sub">
					<input type="submit" value=" ">
				</div>
				<div class="clearfix"></div>
			</form>
		</div>
		
		<div class="col-md-3 header-right footer-bottom">
			<ul>
				@guest('web')
				<li><a href="{{route('checkout')}}" class="use1" data-toggle="modal" ><span>Login</span></a>	
				@endguest
				
				@auth()
				<li><a href="{{route('user.logout')}}" class="use1" ><span>Logout</span></a>
						
				@endauth	
				</li>
				<li><a class="fb" href="#"></a></li>
				<li><a class="twi" href="#"></a></li>
				<li><a class="insta" href="#"></a></li>
				<li><a class="you" href="#"></a></li>
			</ul>
		</div>
		<div class="clearfix"></div>
		
	</div>
</div>
<!-- //header-bot -->

	
<!-- banner -->
<div class="ban-top">
	<div class="container">
		<div class="top_nav_left">
			<nav class="navbar navbar-default">
			  <div class="container-fluid">
				<!-- Brand and toggle get grouped for better mobile display -->
				<div class="navbar-header">
				  <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				  </button>
				</div>
				<!-- Collect the nav links, forms, and other content for toggling -->
				<div class="collapse navbar-collapse menu--shylock" id="bs-example-navbar-collapse-1">
				  <ul class="nav navbar-nav menu__list">
					<li class="active menu__item menu__item--current"><a class="menu__link" href="{{route('home')}}">Home <span class="sr-only">(current)</span></a></li>
					
					<li class="dropdown menu__item">
						<a href="#" class="dropdown-toggle menu__link" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">All Category <span class="caret"></span></a>
							<ul class="dropdown-menu multi-column ">
								<div class="row">
										<ul class="multi-column-dropdown">

										@foreach ($categories as $category)

										<li style="text-transform: uppercase;"><a href="{{route('category.product',$category->id)}}"> {{$category->category_name}}</a></li>

										@endforeach 		
										
										
										</ul>
											
										
									
							
									<div class="clearfix"></div>
								</div>
							</ul>
					</li>
					
					<li class=" menu__item"><a class="menu__link" href="#">Short Codes</a></li>
					<li class=" menu__item"><a class="menu__link" href="#">About US</a></li>
					<li class=" menu__item"><a class="menu__link" href="{{route('contact')}}">contact</a></li>
				  </ul>
				</div>
			  </div>
			</nav>	
		</div>
		<div class="top_nav_right">
			<div class="cart box_1">
						<a href="{{route('show.cart')}}">
							<h3> <div class="total">
								<i class="glyphicon glyphicon-shopping-cart" aria-hidden="true"></i>
								@if ($total>1)
									<span  class="">{{$totalAmount}}</span> ({{$total}} items)</div>
									@else
									<span  class="">{{$totalAmount}}</span> ({{$total}} item)</div>
								@endif
								
								
								
							</h3>
						</a>
						<p><a href="{{route('cart.destroy')}}" class="simpleCart_empty">Empty Cart</a></p>
						
			</div>	
		</div>
		<div class="clearfix"></div>
	</div>
</div>
<!-- //banner-top -->
<!-- banner -->

<!-- login -->
