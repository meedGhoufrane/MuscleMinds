<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = ['cart_id', 'sub_total', 'order_status'];

    public function cart()
    {
        return $this->belongsTo(Cart::class);
    }
}
