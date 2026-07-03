<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

use Illuminate\Support\Facades\Session;



class LoginController extends Controller
{
    //
    public function index(){
        return view('login');
    }

    public function login(Request $request){

        $credentials = $request->validate([
            'email'  =>['required', 'email'],
            'password' => ['required'],
        ]);

       

        if (Auth::attempt($credentials)) {


            return redirect()->intended('dashboard');
        }
        return redirect()->back()->withErrors(['error' => 'Email or Password Invalid!']);
    }
}
