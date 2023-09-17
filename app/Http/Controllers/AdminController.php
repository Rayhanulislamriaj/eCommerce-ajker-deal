<?php

namespace App\Http\Controllers;

use App\Mail\NotifyAdmin;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Mail;

class AdminController extends Controller
{
    public function add_new_admin()
    {
        $admins = User::withTrashed()->where('role', 'admin')->get();
        return view('backend.admin.add_new_admin', compact('admins'));
    }
    public function add_new_admin_post(Request $request)
    {
        $random_password = Str::upper(Str::random(8));
        User::insert([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($random_password),
            'created_at' => Carbon::now(),
            'role' => 'admin'
        ]);

        //email code start
        Mail::to($request->email)->send(new NotifyAdmin($request->email, $random_password));
        //email code end
        return back()->with('success', 'Email Send Successfully!');
    }

    function deactive_admin($id)
    {
        User::find($id)->delete();
        return back();
    }
    function active_admin($id)
    {
        User::withTrashed()->where('id', $id)->restore();
        return back();
    }
}