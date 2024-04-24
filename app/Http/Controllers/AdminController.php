<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Match_results;

class AdminController extends Controller
{
    public function index()
    {
        // Récupérer les résultats des matchs depuis le modèle MatchResult
        $matchResults = Match_results::all();

        // Passer les résultats des matchs à la vue
        return view('admin.dashboard', ['matchResults' => $matchResults]);
    }
    
}
