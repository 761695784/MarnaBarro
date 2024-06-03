<?php

namespace App\Http\Controllers;

use App\Models\Bien;
use Illuminate\Http\Request;

class BienController extends Controller
{
    public function liste(){
        $biens = Bien::all();
        return view('biens.liste',compact('biens'));
       }

       public function modifier_bien($id){
        $biens = Bien::find($id);
        return view('biens.modifier', compact('biens'));
      }	
      
      
      public function modifier_traitement(Request $request){
        $request->validate([
            'image' =>'required',
            'nom' =>'required',
            'categorie'=>'required',
            'adresse'=>'required',
            'DatePubli' =>'required|date',            
            'statut' =>'nullable',
            'description' =>'required',
        ]);
      
        $bien = Bien ::find($request->id);
        $bien->image= $request->image;
        $bien->nom = $request->nom;
        $bien->categorie= $request->categorie;
        $bien->adresse = $request->adresse;
        $bien->DatePubli=$request->DatePubli;
        $bien->statut = $request->has('statut');
        $bien->description= $request->description;
        $bien->update();
      
        return redirect('/liste')->with('status', 'bien modifié avec succès.');
      }




      public function supprimer_bien($id){
        $biens = Bien::find($id);
        $biens->delete();
        return redirect('/liste')->with('status', 'Bien supprimé avec succès.');     
      }








}
