<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
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

        if($request->hasfile('image')){
            $imagepath = $request->file('image')->store('article_images');
            $article->image = $imagepath;
        }
        $article->save();
        return redirect()->back()->with('success', 'Article ajouté avec succès.');
    }
}
