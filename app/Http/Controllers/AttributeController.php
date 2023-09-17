<?php

namespace App\Http\Controllers;

use App\Models\Color;
use App\Models\Size;
use Carbon\Carbon;
use Illuminate\Http\Request;

class AttributeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('backend.attribute.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $colors = Color::where('added_by', auth()->id())->get();
        $sizes = Size::where('added_by', auth()->id())->get();
        return view('backend.attribute.create', compact('colors', 'sizes'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function color_store(Request $request)
    {
        $request->validate([
            'color_name' => 'required'
        ]);
        foreach (explode(',', $request->color_name) as $color) {
            if (!Color::where('color_name', $color)->where('added_by', auth()->id())->exists()) {
                Color::insert([
                    'added_by' => auth()->id(),
                    'color_name' => $color,
                    'created_at' => Carbon::now()
                ]);
            }
        }
        return back()->with('success_color', 'Color Added Successfully');
    }

    public function size_store(Request $request)
    {
        $request->validate([
            'size_name' => 'required'
        ]);
        foreach (explode(',', $request->size_name) as $size) {
            if (!Size::where('size_name', $size)->where('added_by', auth()->id())->exists()) {
                Size::insert([
                    'added_by' => auth()->id(),
                    'size_name' => $size,
                    'created_at' => Carbon::now()
                ]);
            }
        }
        return back()->with('success_size', 'Size Added Successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}