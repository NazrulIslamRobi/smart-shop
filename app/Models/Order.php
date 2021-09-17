<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable=[
        'user_id',
        'customer_name',
        'customer_email',
        'customer_phone_number',
        'address',
        'total_amount',
        

    ];

    public function user(){
        return $this->belongsTo(User::class);

    }

    public function payment(){
        return $this->hasOne(Payment::class);
    }

    public function orders(){
        return $this->hasMany(OrderDetail::class);
    }
}
