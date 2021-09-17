<?php

use App\Http\Controllers\AdminController\AdminController;
use App\Http\Controllers\AdminController\CategoryController;
use App\Http\Controllers\AdminController\OrderController;
use App\Http\Controllers\AdminController\ProductController;
use App\Http\Controllers\FrontendController\CartController;
use App\Http\Controllers\FrontendController\CheckoutController;
use App\Http\Controllers\FrontendController\SmartShopController;
use Illuminate\Support\Facades\Route;
use Laravel\Fortify\Http\Controllers\AuthenticatedSessionController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// frontend route starts here
Route::get('/',[SmartShopController::class,'index'])->name('home');
Route::get('/category/{id}/product',[SmartShopController::class,'categoryProduct'])->name('category.product');
Route::get('/product/{slug}/details',[SmartShopController::class,'productDetails'])->name('product.details');
Route::get('/contact-us',[SmartShopController::class,'contact'])->name('contact');

// Cart rotute starts here
Route::post('/add/cart',[CartController::class,'addCart'])->name('add.cart');
Route::get('/show/cart',[CartController::class,'showCart'])->name('show.cart');
Route::get('/delete/{id}/cart',[CartController::class,'deleteCart'])->name('delete.cart');
Route::post('/update/{rowId}/quantity',[CartController::class,'updateQty'])->name('quantity.update');
Route::get('cart/destroy',[CartController::class,'cartDestroy'])->name('cart.destroy');

//user route starts here
Route::get('/checkout',[CheckoutController::class,'index'])->name('checkout')->middleware('guest');
Route::post('/user/register',[CheckoutController::class,'processRegister'])->name('user.register');
Route::post('/user/login',[CheckoutController::class,'processLogin'])->name('user.login');
Route::get('/user/logout',[CheckoutController::class,'logout'])->name('user.logout');
Route::get('/verify/{token}',[CheckoutController::class,'verify'])->name('verify.email');
Route::get('/checkout/shipping',[CheckoutController::class,'showShippingForm'])->name('shipping')->middleware('auth');
Route::post('/shipping/save',[CheckoutController::class,'processShipping'])->name('shipping.create');
Route::get('/checkout/payment',[CheckoutController::class,'showPaymentForm'])->name('payment')->middleware('auth');
Route::post('/checkout/payment',[CheckoutController::class,'processPayment'])->name('payment');


//admin dashboard route starts here

Route::prefix('admin')->name('admin.')->group(function(){

    Route::get('/login',[AdminController::class,'showLoginForm'])->middleware('guest:admin')->name('login');

    

    $limiter = config('fortify.limiters.login');

    Route::post('/login', [AuthenticatedSessionController::class, 'store'])
        ->middleware(array_filter([
            'guest:admin',
            $limiter ? 'throttle:'.$limiter : null,
        ]));


        Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])->middleware('auth:admin')
        ->name('logout');


    Route::get('/dashboard',[AdminController::class,'index'])->name('dashboard')->middleware('auth:admin');

//category route starts here
Route::resource('/category', CategoryController::class)->middleware('auth:admin');

//product route starts here
Route::resource('/product', ProductController::class)->middleware('auth:admin');
Route::put('/product/{id}/update',[ProductController::class,'updateProduct'])->name('update.product')->middleware('auth:admin');

// order route starts here
Route::get('/order/manage',[OrderController::class,'index'])->name('order.manage')->middleware('auth:admin');
Route::get('/order/{id}/details',[OrderController::class,'orderDetails'])->name('order.details')->middleware('auth:admin');
Route::get('/order/{id}/invoice',[OrderController::class,'orderInvoice'])->name('order.invoice')->middleware('auth:admin');
Route::get('/order/{id}/invoice/download',[OrderController::class,'InvoiceDownload'])->name('invoice.download')->middleware('auth:admin');

});




