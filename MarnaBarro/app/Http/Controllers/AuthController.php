<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function register(){
        return view('register');
    }
    public function registerPost (Request $request){
       $user = new User ();
       $user->name = $request->name;
       $user->email = $request->email;
       $user->password = Hash::make($request->password);
       $user->save();
        return back()->with('succes','enregistrement reussi');
    }

    public function login(){
        return view('login');
    }
    public function loginPost(Request $request){
        
        $credetails =[
        'email'=> $request->email,
        'password'=> $request->password,
        ];

        if (Auth::attempt($credetails)) {
            return redirect('/')->with('succes','bienvenu');
                }

                return back()->with('error','Email ou mot de pass erreur');
    }
    public function logout(){
        Auth::logout();
        return redirect()->back();
    }
}
