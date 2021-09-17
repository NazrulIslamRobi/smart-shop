<?php

namespace App\Http\Controllers\FrontendController;

use App\Http\Controllers\Controller;
use App\Http\Controllers\ServiceController;
use App\Mail\VerifyEmail;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\Payment;
use App\Models\User;
use Gloudemans\Shoppingcart\Facades\Cart;
Use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Mail;
use Prophecy\Doubler\Generator\Node\ReturnTypeNode;

class CheckoutController extends Controller
{
    public function index(){
        return view('frontend.checkout.checkout-content');
    }

    public function processRegister(Request $request){

        $validated= $request->validate([
            'name'=> 'required',
            'email'=>'required|email|unique:users,email',
            'password'=> 'required|confirmed|min:3',
            'phone_number'=> 'required|unique:users,phone_number',
        ]);

        $data=[
            'name'=> $request->input('name'),
            'email'=> $request->input('email'),
            'email_verification_token'=> Str::random(32),
            'password'=>bcrypt( $request->input('password')),
            'phone_number'=> $request->input('phone_number'),
        ];

      if(User::create($data)){
      
        session()->flash('verifyMessage','please verify your email address');
        return redirect()->back();
   
    }
      
    }

    public function verify($token){
       
       $user= User::where('email_verification_token',$token)->first();

        if($user){

            $data=[
                'email_verified'=> 1,
                'email_verification_token'=> ' ',
                'email_verified_at' => Carbon::now(),
            ];

           $user->update($data);

            auth()->login($user);

            $notification=array(
                'messege'=> 'you are logged in',
                'type'=>'success'
            );
            return redirect()->route('shipping')->with($notification);

        }else {
            session()->flash('login','invalid token.');
            return redirect()->route('checkout');
        }
    
    }


    


    public function processLogin(Request $request){

        $credentials= $request->except('_token');
        $credentials['email_verified'] =1;
        
       if( auth()->attempt($credentials)){

       
        return redirect()->route('shipping');

        }else {
            session()->flash('login','invalid credentials');
            return redirect()->route('checkout');
            
        }


    }

public function logout(){

    auth()->guard('web')->logout();

    return redirect()->route('checkout');
}



    public function showShippingForm(){
        return view('frontend.checkout.showShippingForm');
    }


    public function processShipping(Request $request){

        $request->validate([
            'customer_name'=> 'required',
            'customer_email'=>'required',
            'customer_phone_number'=>'required',
            'address' => 'required'
        ]);

        $order= Order::create([
            'user_id' => auth()->user()->id,
            'customer_name' => $request->input('customer_name'),
            'customer_email' => $request->input('customer_email'),
            'customer_phone_number' => $request->input('customer_phone_number'),
            'address' => $request->input('address'),
            'total_amount' => session()->get('total_amount'),
        ]);

        session()->put('orderId',$order->id);

        return redirect()->route('payment');
        
    }
    

    public function showPaymentForm(){

        return view('frontend.checkout.showPaymentForm');
    }

    public function processPayment(Request $request){
        $request->validate([
            'payment_type'=> 'required',
        ]);

        $paymentType= $request->payment_type;
        $orderId= session()->get('orderId');

        if($paymentType == 'cash'){
                
            Payment::create([
                'order_id' => $orderId,
                'payment_type' => $paymentType,
            ]);

            $cartProducts = Cart::content();

            foreach($cartProducts as $cartProduct){

            OrderDetail::create([
                    'order_id'         => $orderId,
                    'product_id'       => $cartProduct->id,
                    'product_name'     => $cartProduct->name,
                    'product_quantity' => $cartProduct->qty,
                    'product_price'    => $cartProduct->price,
            ]);
        }

        Cart::destroy();
        $message = "your product successfully submitted";
		$getNotification = ServiceController::successMessage($message);
        return redirect()->route('home')->with($getNotification);

        }
      
    }


    
    
}
