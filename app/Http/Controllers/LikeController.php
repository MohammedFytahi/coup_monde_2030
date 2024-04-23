<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ArticleLike;
use App\Models\Article;

class LikeController extends Controller
{
    public function toggleLike(Request $request, $articleId)
    {
        // Vérifier si l'utilisateur est connecté
        if ($user = $request->user()) {
            // Vérifier si l'utilisateur a déjà aimé cet article
            $like = ArticleLike::where('user_id', $user->id)
                        ->where('article_id', $articleId)
                        ->first();
    
            // Si l'utilisateur a déjà aimé cet article, supprimer le like
            if ($like) {
                $like->delete();
                $article = Article::find($articleId);
                return response()->json(['message' => 'Like removed successfully', 'likes' => $article->likes]);
            } else {
                // Sinon, créer un nouveau like pour cet article
                ArticleLike::create([
                    'user_id' => $user->id,
                    'article_id' => $articleId
                ]);
                $article = Article::find($articleId);
                return response()->json(['message' => 'Like added successfully', 'likes' => $article->likes]);
            }
        } else {
            // Si l'utilisateur n'est pas connecté, renvoyer une réponse non autorisée
            return response()->json(['error' => 'Unauthorized'], 401);
        }
    }public function getLikesCount($articleId)
    {
        $likesCount = ArticleLike::where('article_id', $articleId)->count();
        
        return response()->json(['likesCount' => $likesCount]);
    }
    
    
}
