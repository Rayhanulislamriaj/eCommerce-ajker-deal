<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    use HasFactory;

    protected $fillable = ['payment_status'];


    function user()
    {
        return $this->hasOne(User::class, 'id', 'user_id');
    }
    function address()
    {
        return $this->hasOne(Address::class, 'id', 'address_id');
    }
    function product()
    {
        return $this->hasOne(Product::class, 'id', 'product_id');
    }

    // function relationtoproduct()
    // {
    //     return $this->hasOne(Product::class, 'id', 'product_id');
    // }
}