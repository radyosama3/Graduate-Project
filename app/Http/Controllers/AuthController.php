<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class AuthController extends Controller
{
    
    public function viewLogin(){
        return view('pages.login');
    }

    public function profile(){
        $profile = Auth::user();
        // return $profile;
        return  view('pages.profile',compact('profile'));
    }

    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            return redirect()->route('profile-page')->with('success', 'Login successful!');
        }

        return back()->withErrors(['identifier' => 'Invalid Identifier or password']);
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/');
    }

    
    public function register(Request $request){
        $request->validate([
            'name' => 'required|string|max:255|min:3',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:8|confirmed',
        ]);

        // Create a new user account
        $user = User::create([
            'name' => $request['name'],
            'email' => $request['email'],
            'password' => bcrypt($request['password']),
            'verification_token' => Str::random(40),
        ]);

        if ($user) {
            return redirect()->route('login')->withErrors(['identifier' => 'created user successfully.']);

        }

        return back()->withErrors(['identifier' => 'unknow errors']);
    }
}
