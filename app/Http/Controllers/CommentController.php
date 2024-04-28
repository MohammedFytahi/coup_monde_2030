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

public function addComment(Request $request, $articleId)
{
    $validatedData = $request->validate([
        'content' => 'required|string|max:255',
    ]);

    $comment = new Comment();
    $comment->article_id = $articleId;
    $comment->user_id = auth()->user()->id; 
    $comment->content = $validatedData['content'];
    $comment->save();

    return redirect()->back()->with('success', 'Comment added successfully.');
}

}
