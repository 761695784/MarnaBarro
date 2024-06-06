<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    public function register(){
        return view('register');
    }
    public function registerPost (Request $request){
      
        $rules = [
            'name' => 'required|max:255|min:4',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:4', // Ajout de 'confirmed' pour la confirmation du mot de passe
        ];

        // Définir les messages personnalisés
        $messages = [
            'name.required' => 'Le nom est obligatoire.',
            'name.max' => 'Le nom ne doit pas dépasser 255 caractères.',
            'email.required' => 'L\'adresse e-mail est obligatoire.',
            'email.email' => 'L\'adresse e-mail doit être valide.',
            'email.unique' => 'L\'adresse e-mail est déjà utilisée.',
            'password.required' => 'Le mot de passe est obligatoire.',
            'password.min' => 'Le mot de passe doit contenir au moins 4 caractères.',
            'password.confirmed' => 'La confirmation du mot de passe ne correspond pas.',
        ];

        // Valider les données
        $validator = Validator::make($request->all(), $rules, $messages);

        // Si la validation échoue, rediriger avec les erreurs
        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }


      
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
