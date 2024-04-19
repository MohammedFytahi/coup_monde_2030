<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    public function index(){
        $articles= Article::all();
        return view('articles.index',compact('articles'));
    }
    public function create(){
        
        return view('articles.create');
    }

    public function store(Request $request){
        $request->validate([
            'title' => 'required',
            'content' => 'required',
            'image' => 'image|mimes:jpeg,png,jpg,gif|max:2048', 
        ]);
    
        $article = new Article();
        $article->title = $request->title;
        $article->content = $request->content;
    
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('images'), $imageName);
            $article->image = 'images/' . $imageName;
        }
    
        $article->save();
    
        return redirect()->back()->with('success', 'Article ajouté avec succès.');
    }

    public function update(Request $request, Article $article)
    {
        // Valider les données du formulaire
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
        ]);
    
        // Mettre à jour les données de l'article
        $article->update($validatedData);
    
        // Rediriger l'utilisateur vers la page des articles avec un message de succès
        return redirect()->route('articles.index')->with('success', 'Article mis à jour avec succès.');
    }
    
    

    public function destroy($id)
    {
        $article = Article::findOrFail($id);
        $article->delete();
        return response()->json(['message' => 'Article supprimé avec succès.']);
    }


    public function like(Request $request, $id)
    {
        $article = Article::findOrFail($id);
        $isLiked = $article->likes()->where('user_id', auth()->id())->exists();
    
        if ($isLiked) {
            // Si déjà liké, détacher le like
            $article->likes()->detach(auth()->id());
            $article->decrement('likes');
        } else {
            // Sinon, attacher le like
            $article->likes()->syncWithoutDetaching(auth()->id());
            $article->increment('likes');
        }
    
        return response()->json(['message' => 'Likes updated successfully']);
    }
    
    public function dislike(Request $request, $id)
    {
        $article = Article::findOrFail($id);
        $isDisliked = $article->dislikes()->where('user_id', auth()->id())->exists();
    
        if ($isDisliked) {

            $article->dislikes()->detach(auth()->id());
            $article->decrement('dislikes');
        } else {

            $article->dislikes()->syncWithoutDetaching(auth()->id());
            $article->increment('dislikes');
        }
    
        return response()->json(['message' => 'Dislikes updated successfully']);
    }

    public function search(Request $request)
    {
        $query = $request->input('query');
    
        $articles = Article::where('title', 'like', "%$query%")
                            ->orWhere('content', 'like', "%$query%")
                            ->get();
    
        // Ajouter le chemin d'accès complet des images aux articles
        $articles->transform(function ($article) {
            $article->image = asset($article->image);
            $article->isAdmin = (auth()->user() && auth()->user()->role == 'admin');
            $article->isUser = (auth()->user() && auth()->user()->role == 'utilisateur');
            return $article;
        });
    
        return response()->json(['articles' => $articles]);
    }

    


}
