<?php

namespace App\Http\Controllers;

use App\Models\Address;
use App\Models\Cart;
use App\Models\Coupon;
use App\Models\Delivery;
use App\Models\Inventory;
use App\Models\Invoice;
use App\Models\Invoice_detail;
use App\Models\Otp;
use App\Models\Product;
use App\Models\Size;
use App\Models\Product_photo;
use Illuminate\Foundation\Auth\User;
use Illuminate\Http\Request;
use App\Models\Contact;
use Carbon\Carbon;
use App\Http\Requests\ContactPostRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Illuminate\Support\Arr;

class FrontendController extends Controller
{
    function index()
    {
        $products = Product::latest()->take(8)->get();
        return view('index', compact('products'));
    }
    function product_details($id)
    {
        $product = Product::findOrFail($id);
        $vendor = User::find($product->user_id);
        $available_colors = Inventory::where('product_id', $id)->select('color_id')->distinct()->get();
        $related_products = Product::where('id', '!=', $id)->where('category_id', $product->category_id)->get();
        return view('product_details', [
            'product' => $product,
            'product_photos' => Product_photo::where('product_id', $id)->get(),
            'vendor' => $vendor,
            'available_colors' => $available_colors,
            'related_products' => $related_products,
        ]);
    }

    public function get_size_lists(Request $request)
    {
        //return $request->product_id;
        // return $request->color_id;
        $size_dropdown = "<option value=''>--Select One Size--</option>";
        $sizes = Inventory::where([
            'product_id' => $request->product_id,
            'color_id' => $request->color_id
        ])->get();
        foreach ($sizes as $size) {
            $size_dropdown .= "<option value='" . $size->size_id . "'>" . Size::find($size->size_id)->size_name . "</option>";
            //echo Size::find($size->size_id)->size_name;
        }
        echo $size_dropdown;
    }
    public function get_price_quantity(Request $request)
    {
        $inventory = Inventory::where([
            'product_id' => $request->product_id,
            'color_id' => $request->color_id,
            'size_id' => $request->size_id
        ])->first();
        return $inventory->product_quantity . "#" . $inventory->product_price;
    }

    public function cart(Request $request)
    {
        $highest_discount_amount = 0;
        if ($request->coupon_name) {
            $coupon_name = $request->coupon_name;
            //if Coupon exists or not
            if (Coupon::where('coupon_name', $request->coupon_name)->exists()) {
                //if Coupon belongs to this vendor
                $coupon_info = Coupon::where('coupon_name', $request->coupon_name)->first();
                $vendor_id = $coupon_info->user_id;
                carts()->first()->vendor_id;
                if ($vendor_id == carts()->first()->vendor_id) {
                    //if Coupon validity exceeds
                    if (Carbon::today()->format('Y-m-d') < $coupon_info->validity) {
                        //if Limit is over
                        if ($coupon_info->limit > 0) {
                            $coupon_discount = $coupon_info->discount_percentage;
                            $highest_discount_amount = $coupon_info->highest_discount_amount;
                        } else {
                            $coupon_discount = 0;
                            return redirect('cart')->with('c_error', 'This Coupon Limit is over!');
                        }
                    } else {
                        $coupon_discount = 0;
                        return redirect('cart')->with('c_error', 'This Coupon Validity alrady exceeds!');
                    }
                } else {
                    $coupon_discount = 0;
                    return redirect('cart')->with('c_error', 'This Coupon does not belongs to this Vendor!');
                }

            } else {
                $coupon_discount = 0;
                return redirect('cart')->with('c_error', 'This Coupon does not exists!');
            }
        } else {
            $coupon_name = "";
            $coupon_discount = 0;
        }
        $carts = Cart::where('user_id', auth()->id())->get();
        return view('cart', compact('carts', 'coupon_name', 'coupon_discount', 'highest_discount_amount'));
    }

    public function add_to_cart(Request $request)
    {
        if (Cart::where('user_id', auth()->id())->exists()) {
            $vendor_id = Product::find($request->product_id)->user_id;
            if ($vendor_id != Cart::where('user_id', auth()->id())->first()->vendor_id) {
                Cart::where('user_id', auth()->id())->delete();
            }
        }

        if (
            Cart::where([
                'user_id' => auth()->id(),
                'product_id' => $request->product_id,
                'color_id' => $request->color_id,
                'size_id' => $request->size_id,
            ])->exists()
        ) {
            Cart::where([
                'user_id' => auth()->id(),
                'product_id' => $request->product_id,
                'color_id' => $request->color_id,
                'size_id' => $request->size_id,
            ])->increment('user_input', $request->user_input);
            return "Updated to Cart!";
        } else {
            Cart::insert([
                'user_id' => auth()->id(),
                'vendor_id' => Product::find($request->product_id)->user_id,
                'product_id' => $request->product_id,
                'color_id' => $request->color_id,
                'size_id' => $request->size_id,
                'user_input' => $request->user_input,
                'created_at' => Carbon::now()
            ]);
            return "added to Cart!";
        }
    }
    public function cart_remove($id)
    {
        Cart::find($id)->delete();
        return back();
    }
    public function cart_update(Request $request)
    {
        foreach ($request->quantity as $cart_id => $user_input) {
            Cart::find($cart_id)->update([
                'user_input' => $user_input
            ]);
        }
        return back();
    }
    function cart_clear()
    {
        Cart::where('user_id', auth()->id())->delete();
        return redirect('cart');
    }
    function checkout()
    {
        if (strpos(url()->previous(), 'cart')) {
            $addresses = Address::where('customer_id', auth()->id())->get();
            $deliveries = Delivery::all();
            return view('checkout', compact('addresses', 'deliveries'));
        } else {
            return redirect('cart');
        }
    }
    function final_checkout(Request $request)
    {
        $invoice_id = Invoice::insertGetId([
            'customer_id' => auth()->id(),
            'vendor_id' => carts()->first()->vendor_id,
            'subtotal' => session('S_sub_total'),
            'coupon_name' => session('S_coupon_name'),
            'coupon_discount' => session('S_coupon_discount'),
            'coupon_discount_amount' => session('S_discount_amount'),
            'total' => session('S_total'),
            'address_id' => $request->address_id,
            'delivery_charge' => $request->delivery_cost,
            'payment_option' => $request->payment_option,
            'created_at' => Carbon::now()
        ]);
        foreach (carts() as $cart) {
            Invoice_detail::insert([
                'invoice_id' => $invoice_id,
                'product_id' => $cart->product_id,
                'color_id' => $cart->color_id,
                'size_id' => $cart->size_id,
                'user_input' => $cart->user_input,
                'created_at' => Carbon::now(),
            ]);
            //Inventory minus start
            Inventory::where([
                'product_id' => $cart->product_id,
                'color_id' => $cart->color_id,
                'size_id' => $cart->size_id,
            ])->decrement('product_quantity', $cart->user_input);
            //Inventory minus end

            //remove from cart table
            $cart->delete();
        }
        //remove coupon limit
        if (session('S_coupon_name')) {
            Coupon::where('coupon_name', session('S_coupon_name'))->decrement('limit');
        }

        if ($request->payment_option == 'online') {
            session(['S_delivery_cost' => $request->delivery_cost]);
            session(['S_invoice_id' => $invoice_id]);
            return redirect('pay');
        }

        return redirect('cart')->with('success', 'Your Order submitted successfully!');
    }

    function about()
    {
        $contacts = Contact::latest()->get();
        return view('about', compact('contacts'));
    }
    function contact()
    {
        return view('contact');
    }
    function contact_post(ContactPostRequest $request)
    {
        //insert into contact table start
        Contact::insert([
            'name' => $request->name,
            'email' => $request->email,
            'subject' => $request->subject,
            'message' => $request->message,
            'created_at' => Carbon::now()
        ]);
        //insert into contact table end

        //redirect to previous page after success
        return back()->with('success', 'Message send successfully!');
    }

    //registration via phone number sms start
    function send_otp(Request $request)
    {
        //create a OPT
        $otp = rand(111111, 999999);
        //store  OPT on the database
        if (Otp::where('phone_number', $request->phone_number)->exists()) {
            Otp::where('phone_number', $request->phone_number)->delete();
            Otp::insert([
                'phone_number' => $request->phone_number,
                'otp' => $otp,
                'created_at' => Carbon::now(),
            ]);
        } else {
            Otp::insert([
                'phone_number' => $request->phone_number,
                'otp' => $otp,
                'created_at' => Carbon::now(),
            ]);
        }
        // send OTP via sms
        $url = "http://bulksmsbd.net/api/smsapi";
        $api_key = "eIv5oBEBDXcO4z3NLNeF";
        $senderid = "8809617612615";
        $number = "$request->phone_number";
        $message = "test sms " . $otp . " check";

        $data = [
            "api_key" => $api_key,
            "senderid" => $senderid,
            "number" => $number,
            "message" => $message
        ];
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        $response = curl_exec($ch);
        curl_close($ch);
        session(['S_otp_phone_number' => $request->phone_number]);
        return redirect('submit/otp');
    }
    function resend_otp()
    {
        //create a OPT
        $newotp = rand(111111, 999999);
        Otp::where('phone_number', session('S_otp_phone_number'))->update([
            'otp' => $newotp,
        ]);
        // send OTP via sms
        $url = "http://bulksmsbd.net/api/smsapi";
        $api_key = "eIv5oBEBDXcO4z3NLNeF";
        $senderid = "8809617612615";
        $number = session('S_otp_phone_number');
        $message = "test sms " . $newotp . " check";

        $data = [
            "api_key" => $api_key,
            "senderid" => $senderid,
            "number" => $number,
            "message" => $message
        ];
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        $response = curl_exec($ch);
        curl_close($ch);
        return back()->with('success', 'New OTP sent.');
    }
    function submit_otp()
    {
        return view('otp_submit');
    }
    function validate_otp(Request $request)
    {
        // return $request->except('_token');
        $flattend = Arr::flatten($request->except('_token'));
        $otp_from_user = implode('', $flattend);
        if (
            Otp::where([
                'phone_number' => session('S_otp_phone_number'),
                'otp' => $otp_from_user
            ])->exists()
        ) {
            //if OTP is correct, now insert in user table
            User::insert([
                'name' => session('S_otp_phone_number'),
                'email' => session('S_otp_phone_number') . "@tiger.com",
                'email_verified_at' => Carbon::now(),
                'password' => bcrypt('password'),
                'created_at' => Carbon::now(),
                'phone_number' => session('S_otp_phone_number')
            ]);
            //delete this OTP
            Otp::where('phone_number', session('S_otp_phone_number'))->delete();
            //now login into customer profile
            Auth::login(User::where('email', session('S_otp_phone_number') . "@tiger.com")->first());
            return redirect('dashboard');
        } else {
            return back()->with('error', 'OTP is wrong! Please try again.');
        }
    }
    //registration via phone number sms end


    //login via phone number sms start
    function login_otp(Request $request)
    {
        if (User::where('phone_number', $request->phone_number)->exists()) {
            //create a OPT
            $otp = rand(111111, 999999);
            //store  OPT on the database
            if (Otp::where('phone_number', $request->phone_number)->exists()) {
                Otp::where('phone_number', $request->phone_number)->delete();
            }
            Otp::insert([
                'phone_number' => $request->phone_number,
                'otp' => $otp,
                'valid_till' => Carbon::now()->addMinutes(2),
                'created_at' => Carbon::now(),
            ]);
            // send OTP via sms
            // $url = "http://bulksmsbd.net/api/smsapi";
            // $api_key = "eIv5oBEBDXcO4z3NLNeF";
            // $senderid = "8809617612615";
            // $number = "$request->phone_number";
            // $message = "Login sms " . $otp . " check";

            // $data = [
            //     "api_key" => $api_key,
            //     "senderid" => $senderid,
            //     "number" => $number,
            //     "message" => $message
            // ];
            // $ch = curl_init();
            // curl_setopt($ch, CURLOPT_URL, $url);
            // curl_setopt($ch, CURLOPT_POST, 1);
            // curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
            // curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            // curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
            // $response = curl_exec($ch);
            // curl_close($ch);
            session(['S_otp_phone_number' => $request->phone_number]);
            return redirect('submit/login/otp');
        } else {
            return back()->with('phone_number_error', 'This Number does not match our records!');
        }
    }
    function resend_login_otp()
    {
        //create a OPT
        $newotp = rand(111111, 999999);
        Otp::where('phone_number', session('S_otp_phone_number'))->update([
            'otp' => $newotp,
            'valid_till' => Carbon::now()->addMinutes(2)
        ]);
        // send OTP via sms
        // $url = "http://bulksmsbd.net/api/smsapi";
        // $api_key = "eIv5oBEBDXcO4z3NLNeF";
        // $senderid = "8809617612615";
        // $number = session('S_otp_phone_number');
        // $message = "Login sms " . $newotp . " check";

        // $data = [
        //     "api_key" => $api_key,
        //     "senderid" => $senderid,
        //     "number" => $number,
        //     "message" => $message
        // ];
        // $ch = curl_init();
        // curl_setopt($ch, CURLOPT_URL, $url);
        // curl_setopt($ch, CURLOPT_POST, 1);
        // curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
        // curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        // curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        // $response = curl_exec($ch);
        // curl_close($ch);
        return back()->with('success', 'New OTP sent.');
    }

    function submit_login_otp()
    {
        return view('otp_login_submit');
    }
    function login_validate_otp(Request $request)
    {
        // return $request->except('_token');
        $flattend = Arr::flatten($request->except('_token'));
        $otp_from_user = implode('', $flattend);
        if (
            Otp::where([
                'phone_number' => session('S_otp_phone_number'),
                'otp' => $otp_from_user
            ])->exists()
        ) {
            $validity_time = Otp::where('phone_number', session('S_otp_phone_number'))->first()->valid_till;
            if (Carbon::now() > $validity_time) {
                return back()->with('error', 'This OTP already Expired! Please resend again.');
            } else {
                $email_address = session('S_otp_phone_number') . "@tiger.com";
                //delete this OTP
                Otp::where('phone_number', session('S_otp_phone_number'))->delete();
                //now login into customer profile
                Auth::login(User::where('email', session('S_otp_phone_number') . "@tiger.com")->first());
                return redirect('dashboard');
            }
        } else {
            return back()->with('error', 'OTP is wrong! Please try again.');
        }
    }
    //login via phone number sms end


}