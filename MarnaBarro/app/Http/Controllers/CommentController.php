<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    

    
    public function store(Request $request)
    {
       
        $validatedData = $request->validate([
            'auteur' => 'required',
            'contenu' => 'required',
            'bien_id' => 'required|exists:biens,id',
            'DatePublication' => 'required',
        ]);
        
    
        Comment::create([
            'auteur' => $validatedData['auteur'],
            'contenu' => $validatedData['contenu'],
            'bien_id' => $validatedData['bien_id'],
            'DatePublication' => $validatedData['DatePublication'],
        ]);

    
        return redirect()->back()
        ->with('status', 'Commentaire ajouté avec succès.');
        }














}
