<?php

namespace App\Http\Controllers;

use App\Models\Delivery;
use Carbon\Carbon;
use Illuminate\Http\Request;

class DeliveryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $deliveries = Delivery::all();
        return view('backend.delivery.index', compact('deliveries'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.delivery.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            '*' => 'required'
        ]);

        Delivery::insert([
            'details' => $request->details,
            'cost' => $request->cost,
            'created_at' => Carbon::now(),
        ]);
        return back()->with('success', 'New Delivery Details add successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Delivery $delivery)
    {
        // return view('backend.delivery.index', compact('delivery'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Delivery $delivery)
    {
        return view('backend.delivery.edit', compact('delivery'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Delivery $delivery)
    {
        $delivery->details = $request->details;
        $delivery->cost = $request->cost;
        $delivery->save();
        return redirect('delivery');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}