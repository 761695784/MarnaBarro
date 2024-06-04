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



        public function edit(Comment $comment) {
            return view('comments.edit', compact('comment'));

        }


        public function update(Request $request, $id)
        {
            $request->validate([
                'auteur' => 'required',
                'contenu' => 'required',
            ]);
    
            $comment = Comment::findOrFail($id);
            $comment->update([
                'auteur' => $request->auteur,
                'contenu' => $request->contenu,
            ]);
    
          
            return redirect()->back()
            ->with('status', 'Commentaire modifié avec succès.');
        }




        public function destroy(Comment $comment) {
            $comment->delete();
            return redirect()->route('details', ['id' => $comment->bien_id])
                             ->with('status', 'Commentaire supprimé avec succès.');
        }





}
