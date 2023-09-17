<?php

namespace App\Http\Controllers;

use App\Models\Inventory;
use App\Models\Product;
use App\Models\Color;
use App\Models\Size;
use App\Models\Category;
use App\Models\Product_photo;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Intervention\Image\ImageManagerStatic as Image;
use Illuminate\Support\Str;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('backend.product.index', [
            'products' => Product::where('user_id', auth()->id())->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
        return view('backend.product.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'product_name' => 'required',
            'product_short_details' => 'required',
            'product_long_details' => 'required',
            'product_additional_info' => 'required',
            'product_care_instructions' => 'required',
        ]);
        //return $request;
        $product_id = Product::insertGetId([
            'user_id' => auth()->id(),
            'category_id' => $request->category_id,
            'product_name' => $request->product_name,
            'product_short_details' => $request->product_short_details,
            'product_long_details' => $request->product_long_details,
            'product_additional_info' => $request->product_additional_info,
            'product_care_instructions' => $request->product_care_instructions,
            'created_at' => Carbon::now()
        ]);
        //echo $product_id;
        foreach ($request->file('product_photos') as $product_photo) {
            echo $product_photo;
            //Photo Upload start
            $genarated_product_photo_name = $product_id . "." . time() . "." . Str::random(5) . "." . $product_photo
                ->getClientOriginalExtension();

            Image::make($product_photo)->resize(750, 750)
                ->save(base_path('public/uploads/product_photos/' . $genarated_product_photo_name));
            //Photo Upload  End

            //Insert Photos in Database Start
            Product_photo::insert([
                'product_id' => $product_id,
                'product_photo' => $genarated_product_photo_name,
                'created_at' => Carbon::now()
            ]);
            //Insert Photos in Database End
        }
        return back();
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        //
    }
    public function stock($id)
    {
        $product = Product::findOrFail($id);
        $colors = Color::where('added_by', auth()->id())->get();
        $sizes = Size::where('added_by', auth()->id())->get();
        // $stocks = Inventory::where('added_by', auth()->id())->get();
        $stocks = Inventory::where('product_id', $id)->get();
        return view('backend.product.stock', compact('product', 'colors', 'sizes', 'stocks'));
    }

    public function stock_store(Request $request, $id)
    {
        $request->validate([
            '*' => 'required'
        ]);
        if ($request->regular_price < $request->product_price) {
            return back()->with('error', 'Regular Price can not be less than Discounted Price!');
        }
        if (
            Inventory::where([
                'vendor_id' => auth()->id(),
                'product_id' => $id,
                'color_id' => $request->color_id,
                'size_id' => $request->size_id
            ])->exists()
        ) {
            return back()->with('error', 'This stock variation already added!');

        } else {
            Inventory::insert([
                'vendor_id' => auth()->id(),
                'product_id' => $id,
                'color_id' => $request->color_id,
                'size_id' => $request->size_id,
                'product_quantity' => $request->product_quantity,
                'product_price' => $request->product_price,
                'regular_price' => $request->regular_price,
                'created_at' => Carbon::now()
            ]);
            return back()->with('success', 'New Stock Added Successfully!');
        }
    }

    public function add_stock(Request $request, $id)
    {
        Inventory::findOrFail($id)->increment('product_quantity', $request->quantity);
        return back();
    }
}