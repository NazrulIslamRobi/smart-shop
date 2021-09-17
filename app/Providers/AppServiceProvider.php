<?php

namespace App\Providers;

use App\Models\Category;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use View;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
       
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
       

        Schema::defaultStringLength(191);

        view()->composer('frontend.layouts.header', function ($view) {
            $view->with('categories',Category::select('id','category_name','slug_name','publication_status')->where('publication_status',1)->get());
        });

        view()->composer('frontend.layouts.header', function ($view) {
            $view->with('total',Cart::count());
        });
        view()->composer('frontend.checkout.showShippingForm', function ($view) {
            $view->with('cart',Cart::count());
        });
        
        view()->composer('frontend.layouts.header', function ($view) {
            $view->with('totalAmount',Cart::subtotal());
        });
    }
}
