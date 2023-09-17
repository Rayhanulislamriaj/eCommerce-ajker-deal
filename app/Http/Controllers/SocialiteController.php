<?php

namespace App\Http\Controllers;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;

class SocialiteController extends Controller
{
    function google_redirect()
    {
        return Socialite::driver('google')->redirect();
    }
    function google_callback()
    {
        $user = Socialite::driver('google')->user();
        if (User::where('email', $user->getEmail())->exists()) {
            Auth::login(User::where('email', $user->getEmail())->first());
            return redirect('dashboard');
        } else {
            $random_password = Str::random(5);
            $created_user = User::create([
                'name' => $user->getName(),
                'email' => $user->getEmail(),
                'email_verified_at' => Carbon::now(),
                'password' => Hash::make($random_password),
                'created_at' => Carbon::now(),
            ]);
            if (Auth::attempt(['email' => $user->getEmail(), 'password' => $random_password])) {
                return redirect('dashboard');
            } else {
                echo 'Something went wrong, Contact with Developer as soon as possible!';
            }
        }
    }
}