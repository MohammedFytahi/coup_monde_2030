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
        // Nombre d'articles
        $numberOfArticles = Article::count();

        // Nombre de matchs
        $numberOfMatches = Matche::count();

        // Nombre d'équipes
        $numberOfTeams = Team::count();

        // Nombre d'utilisateurs
        $numberOfUsers = User::count();

        // Utilisateur avec le plus de commentaires
        $userWithMostComments = User::withCount('comments')->orderByDesc('comments_count')->first();

        // Article avec le plus de likes et de commentaires
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
