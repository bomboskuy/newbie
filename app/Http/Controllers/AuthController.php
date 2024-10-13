<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{
    public function login()
    {
        return view('auth.login');
    }

    public function otwlogin(Request $request){
        $validate =  $request->validate([
            'username' => ['required', 'string'],
            'password' => ['required'],
        ]);
        if(Auth::attempt($validate)){
            $request->session()->regenerate();
            return redirect()->intended('/dashboard');
        }
        Session::flash('failed','Account not found');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/login');
    }

    public function dashboard()
    {
        $user = Auth::user();
        return view('dashboard', compact('user'));
    }

    public function showRegisterForm()
    {
        return view('auth.register');
    }

    public function otwregister(Request $request)
    {
        $request->validate([
            'username' => 'required|string|max:60|unique:user,username',
            'password'  =>'required|min:5',
        ]);

        DB::table('user')->insert([
            'username' => $request->input('username'),
            'password' => bcrypt($request->input('password')),
            'idrole' => 3,
        ]);

        return redirect('/login');
    }
}
