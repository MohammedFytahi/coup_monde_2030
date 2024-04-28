<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ArticleLike;
use App\Models\Article;

class LikeController extends Controller
{
    public function toggleLike(Request $request, $articleId)
    {
       
        if ($user = $request->user()) {
           
            $like = ArticleLike::where('user_id', $user->id)
                        ->where('article_id', $articleId)
                        ->first();
    
         
            if ($like) {
                $like->delete();
                $article = Article::find($articleId);
                return response()->json(['message' => 'Like removed successfully', 'likes' => $article->likes]);
            } else {
               
                ArticleLike::create([
                    'user_id' => $user->id,
                    'article_id' => $articleId
                ]);
                $article = Article::find($articleId);
                return response()->json(['message' => 'Like added successfully', 'likes' => $article->likes]);
            }
        } else {
            
            return response()->json(['error' => 'Unauthorized'], 401);
        }
    }public function getLikesCount($articleId)
    {
        $likesCount = ArticleLike::where('article_id', $articleId)->count();
        
        return response()->json(['likesCount' => $likesCount]);
    }
    
    
}
