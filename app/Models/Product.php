<?php

namespace App\Models;

use App\Events\ProductCreated;
use App\Events\ProductDeleted;
use App\Events\ProductUpdated;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'category_id',
        'title',
        'description',
        'in_stok',
        'quantity',
        'regular_price',
        'sale_price',
        'product_status',
        
    ];

    public function category(){
      return $this->belongsTo(Category::class);
    }

    public function images(){
        return $this->hasMany(Image::class);
    }

    protected $dispatchesEvents=[
        'created' => ProductCreated::class, 
        'updated' => ProductUpdated::class,
        'deleted' => ProductDeleted::class,
    ];

}
