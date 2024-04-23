<?php

namespace App\Http\Controllers;

use App\Models\Annonces;
use App\Models\Commentaire;
use Illuminate\Database\QueryException;
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
        try {
            // Vérifier si l'utilisateur est authentifié
            // if (!auth()->check()) {
            //     return redirect()->back()->withErrors('You must be logged in to add a comment.');
            // }

            // Valider le contenu du commentaire
            $request->validate([
                'content' => 'required|string|max:255',
            ]);


            // Créer le commentaire dans la base de données
            Commentaire::create([
                'annonce_id' => $annonceId,
                'user_id' => auth()->user()->id,
                'content' => $request->input('content'),
            ]);
            dd($annonceId);

            // Redirection avec un message de succès
            return redirect()->back()->withSuccess('Comment added successfully');
        } catch (QueryException $e) {
            // Gérer les exceptions liées à la base de données
            return redirect()->back()->withErrors('An error occurred while adding the comment.');
        } catch (\Exception $e) {
            // Gérer d'autres exceptions
            return redirect()->back()->withErrors('An unexpected error occurred.');
        }
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
