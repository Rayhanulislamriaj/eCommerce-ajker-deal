<?php
use App\Models\Cart;
use App\Models\Review;

function cart_amount()
{
    return Cart::where('user_id', auth()->id())->count();
}
function carts()
{
    return Cart::where('user_id', auth()->id())->get();
}
function reviews($product_id)
{
    return Review::where('product_id', $product_id)->get();
    // return $product_id;
}