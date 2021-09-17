<?php

namespace App\Listeners;

use App\Models\Product;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class ProductCacheListener
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  object  $event
     * @return void
     */
    public function handle($event)
    {
     
        cache()->forget('products');
        
        $data = Product::with('images')->where('product_status',1)->orderBy('id','desc')->take(12)->get();
        
        cache()->forever('products', $data);
        
    }
}
