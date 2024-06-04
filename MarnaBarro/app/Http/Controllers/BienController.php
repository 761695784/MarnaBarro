<?php

namespace App\Http\Controllers;

use App\Models\Bien;
use Illuminate\Http\Request;

class BienController extends Controller
{
      public function afficher_biens (){
         $biens = Bien::all();
         return view('biens/index',compact('biens'));
     // return view('biens/index');
   }

   public function ajouter_biens(){

    return view('biens/ajouter');
       }

       public function sauvegarder (Request $request){
         Bien::create($request->all());
         
         return redirect('/bien') ;

       }
}
