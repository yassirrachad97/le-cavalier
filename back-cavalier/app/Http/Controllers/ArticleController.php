<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ArticleController extends Controller
{


    public function index()
    {
        $articles = Article::all();

        return view('backOffice.Articles', compact('articles'));
    }


    public function show($id)
    {
        $article = Article::findOrFail($id);
        return view('frentOffice.article', compact('article'));
    }

    public function store(Request $request)
    {
        $user = Auth::user();


        if ($user && $user->role_id == 1) {


            $validatedData = $request->validate([
                'titre' => 'required|string|max:255',
                'content' => 'required|string',
                'photo' => 'required|image',
            ]);



            $photo = $request->file('photo')->store('photos', 'public');


            $article = Article::create([
                'titre' => $validatedData['titre'],
                'content' => $validatedData['content'],
                'photo' => $photo,
                'user_id' => $user->id,
            ]);


        }

        $article->save();



        return redirect()->back()->with('success', 'Article créé avec succès');
    }


    public function update(Request $request, $articleId)
    {


        $article = Article::findOrFail($articleId);
        $photo = $request->file('photo')->store('photos', 'public');

        $article->update([
            'titre' => $request['titre'],
            'content' => $request['content'],
            'photo' => $photo,
        ]);

        return redirect()->back()->with('success', 'Article modifié avec succès');
    }

    public function destroy($articleId)
    {
        $article = Article::findOrFail($articleId);

        $article->delete();

        return redirect()->back()->with('success', 'Article supprimé avec succès');
    }
}
