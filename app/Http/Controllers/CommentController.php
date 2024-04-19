<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comment;

class CommentController extends Controller
{

    public function index($id)
{
    $comment = Comment::findOrFail($id);

    return view('articles.comments', compact('id', 'comment'));
}

    public function store(Request $request)
    {
        $request->validate([
            'article_id' => 'required|exists:articles,id',
            'content' => 'required',
        ]);

        $comment = new Comment();
        $comment->article_id = $request->article_id;
        $comment->user_id = auth()->id(); 
        $comment->content = $request->content;
        $comment->save();

        return response()->json(['success' => true, 'message' => 'Commentaire ajouté avec succès']);
    }
}
