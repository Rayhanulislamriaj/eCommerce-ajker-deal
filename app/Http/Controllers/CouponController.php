<?php

namespace App\Http\Controllers;

use App\Models\Coupon;
use Carbon\Carbon;
use Illuminate\Http\Request;

class CouponController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $coupons = Coupon::where('user_id', auth()->id())->latest()->paginate(5);
        return view('backend.coupon.index', compact('coupons'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'coupon_name' => 'required',
            'discount_percentage' => 'required',
            'validity' => 'required',
            'limit' => 'required',
            'highest_discount_amount' => 'required',
        ]);
        // Way 2
        $coupon = new Coupon;
        $coupon->user_id = auth()->id();
        $coupon->coupon_name = $request->coupon_name;
        $coupon->discount_percentage = $request->discount_percentage;
        $coupon->validity = $request->validity;
        $coupon->limit = $request->limit;
        $coupon->highest_discount_amount = $request->highest_discount_amount;
        $coupon->save();
        return back()->with('success', 'Coupon Add Successfully!');

        //Way 3
        //     Coupon::create($request->except('_token') + [
        //         'user_id' => auth()->id()
        //     ]);

    }

    /**
     * Display the specified resource.
     */
    public function show(Coupon $coupon)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Coupon $coupon)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Coupon $coupon)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Coupon $coupon)
    {
        //
    }
}