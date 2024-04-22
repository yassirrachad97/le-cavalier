<?php

namespace App\Http\Controllers;

use App\Models\Annonces;
use App\Models\Commentaire;
use Illuminate\Http\Request;

class CommentaireController extends Controller
{

    public function index()
    {
        
        $commentaires = Commentaire::paginate(5);
        return view('frentOffice.details', compact('commentaires'));
    }

    public function store(Request $request, $annonceId)
    {
        $request->validate([
            'content' => 'required|string|max:255',
        ]);

        Commentaire::create([
            'annonce_id' => $annonceId,
            'user_id' => auth()->user()->id,
            'content' => $request->input('content'),
        ]);

        return redirect()->back()->withSuccess('success', 'Comment added successfully');
    }

    public function update(Request $request, $commentId)
    {
        $request->validate([
            'content' => 'required|string|max:255',
        ]);

        $comment = Commentaire::findOrFail($commentId);

        if ($comment->user_id !== auth()->user()->id) {
            return redirect()->back()->withErrors( 'You are not authorized to update this comment');
        }

        $comment->update([
            'content' => $request->input('content'),
        ]);

        return redirect()->back()->withSuccess( 'Comment updated successfully');
    }
    public function delete($commentId)
    {
        $comment = Commentaire::findOrFail($commentId);

        if ($comment->user_id !== auth()->user()->id) {
            return redirect()->back()->withErrors( 'You are not authorized to delete this comment');
        }

        $comment->delete();

        return redirect()->back()->withSuccess( 'Comment deleted successfully');
    }
}
