<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Invoice_detail extends Model
{
    use HasFactory;

    function product()
    {
        return $this->hasOne(Product::class, 'id', 'product_id');
    }
    function size()
    {
        return $this->hasOne(Size::class, 'id', 'size_id');
    }
    function color()
    {
        return $this->hasOne(Color::class, 'id', 'color_id');
    }
    function inventory()
    {
        return $this->hasOne(Inventory::class, 'id', 'inventory_id');
    }
}