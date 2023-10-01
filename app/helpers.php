<?php
use App\Models\Cart;
use App\Models\Inventory;
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
function stock_checker($product_id)
{
    if (Inventory::where('product_id', $product_id)->exists()) {
        if (Inventory::where('product_id', $product_id)->sum('product_quantity') == 0) {
            return false;
        } else {
            return true;
        }
    } else {
        return false;
    }
}
function lowest_product_price($product_id)
{
    if (Inventory::where('product_id', $product_id)->exists()) {
        return Inventory::where('product_id', $product_id)->min('product_price');
    } else {
        return false;
    }
}