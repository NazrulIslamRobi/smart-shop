@extends('frontend.layouts.master')

@section('title','Checkout')


@section('content')

<!-- check out -->
<div style="margin-top: 50px; margin-bottom:50px;">
	<div class="container">
		<div class="well">
		<h3>You have to Sing in to complete your valueable order. If you are not Register please Register.</h3>
		</div>
				<div class="" role="document">
					<div class="modal-content modal-info">
						
						<div class="modal-body modal-spa">
							<div class="login-grids">
								<div class="login">
									<div class="login-bottom">
										<h3>Sign up for free</h3>

									@if ($errors->any())
										<div class="alert alert-danger">
											@foreach ($errors->all() as $error)
												<ul>
													<li>{{$error}}</li>
												</ul>
											@endforeach
										</div>
									@endif
									@if (session()->has('verifyMessage'))
									<div class="alert alert-success">
										
												<span>{{session('verifyMessage')}}</span>
											
									</div>
										
									@endif
										<form action="{{route('user.register')}}" method="POST">
											@csrf
										<div class="sign-up">
												<h4>Name :</h4>
												<input type="text" placeholder="Enter Name" name="name" value="{{old('name')}}"  required="">	
											</div>

											<div class="sign-up">
												<h4>Email :</h4>
												<input type="text" placeholder="Enter Email" name="email" value="{{old('email')}}"  required="">	
											</div>

											<div class="sign-up">
												<h4>Phone Number :</h4>
												<input type="text" placeholder="Enter Phone number"  name="phone_number" value="{{old('phone_number')}}"  required="">	
											</div>

											<div class="sign-up">
												<h4>Password :</h4>
												<input type="password" name="password"  onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Password';}" required="">
												
											</div>
											<div class="sign-up">
												<h4>Re-type Password :</h4>
												<input type="password" name="password_confirmation" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Password';}" required="">
												
											</div>
											<div class="sign-up">
												<input type="submit" value="REGISTER NOW" >
											</div>
											
										</form>
									</div>
									<div class="login-right">
										<h3>Sign in with your account</h3>

										@if (session()->has('login'))
										<div class="alert alert-success">
										
												<span>{{session('login')}}</span>
											
									</div>
										
									@endif
										<form action="{{route('user.login')}}" method="POST">
											@csrf
											<div class="sign-in">
												<h4>Email :</h4>
												<input type="text"  name="email" placeholder="Enter email">	
											</div>
											<div class="sign-in">
												<h4>Password :</h4>
												<input type="password"  name="password" placeholder="Enter password" required="">
												<a href="#">Forgot password?</a>
											</div>
											<div class="single-bottom">
												<input type="checkbox"  id="brand" value="">
												<label for="brand"><span></span>Remember Me.</label>
											</div>
											<div class="sign-in">
												<input type="submit" value="SIGNIN" >
											</div>
										</form>
									</div>
									<div class="clearfix"></div>
								</div>
								<p>By logging in you agree to our <a href="#">Terms and Conditions</a> and <a href="#">Privacy Policy</a></p>
							</div>
						</div>
					</div>
				</div>
			</div>
<!-- //login -->
			
				
			

			
	</div>
</div>
					
<!-- //check out -->    
@endsection