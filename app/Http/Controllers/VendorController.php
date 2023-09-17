<?php

namespace App\Http\Controllers;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;


class VendorController extends Controller
{
    public function register()
    {
        return view('vendor_register');
    }
    public function register_post(Request $request)
    {
        $request->validate([
            '*' => 'required',
            'password' => ['confirmed', Password::min(8)->letters()->mixedCase()->numbers()->symbols(), 'max:12']


        ]);
        User::insert([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'created_at' => Carbon::now(),
            'deleted_at' => Carbon::now(),
            'role' => 'vendor'
        ]);
        return back()->with('success', 'Your application send successfully! After approval you will recive a confirmation email.');
    }
}