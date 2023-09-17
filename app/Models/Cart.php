<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;
    protected $fillable = ['user_input'];
    function relationtoproduct()
    {
        return $this->hasOne(Product::class, 'id', 'product_id');
    }
    function relationtouser()
    {
        return $this->hasOne(User::class, 'id', 'vendor_id');
    }
    function relationtocolor()
    {
        return $this->hasOne(Color::class, 'id', 'color_id');
    }
    function relationtosize()
    {
        return $this->hasOne(Size::class, 'id', 'size_id');
    }

}