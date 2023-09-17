<?php

namespace App\Http\Controllers;

use App\Models\Invoice_detail;
use App\Models\Review;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class ReviewController extends Controller
{
    public function give_review($invoice_id)
    {
        // return $invoice_id;
        $products = Invoice_detail::where('invoice_id', $invoice_id)->get();
        return view('backend.customer.give_review', compact('products'));
    }
    function insert_review($invoice_details_id, Request $request)
    {
        $product_id = Invoice_detail::find($invoice_details_id)->product_id;
        Review::insert([
            'user_id' => auth()->id(),
            'invoice_details_id' => $invoice_details_id,
            'product_id' => $product_id,
            'rating' => $request->rating,
            'review' => $request->review,
            'created_at' => Carbon::now()
        ]);
        return back();
    }
}