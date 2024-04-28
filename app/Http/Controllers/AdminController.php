<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article;
use App\Models\User;
use App\Models\Team;
use App\Models\Matche;

class AdminController extends Controller
{
    public function index()
    {
        
        $numberOfArticles = Article::count();

        
        $numberOfMatches = Matche::count();

       
        $numberOfTeams = Team::count();

       
        $numberOfUsers = User::count();

       
        $userWithMostComments = User::withCount('comments')->orderByDesc('comments_count')->first();


        $articleWithMostLikesAndComments = Article::withCount(['likes', 'comments'])->orderByDesc('likes_count')->orderByDesc('comments_count')->first();
        

        return view('admin.dashboard', [
            'numberOfArticles' => $numberOfArticles,
            'numberOfMatches' => $numberOfMatches,
            'numberOfTeams' => $numberOfTeams,
            'numberOfUsers' => $numberOfUsers,
            'userWithMostComments' => $userWithMostComments,
            'articleWithMostLikesAndComments' => $articleWithMostLikesAndComments,
        ]);
    }
}
