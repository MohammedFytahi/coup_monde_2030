<?php

namespace App\Http\Controllers;


use App\Models\Matche;
use App\Models\Team;
use App\Models\Match_results;
use App\Models\Stadium;
use Illuminate\Http\Request;

class MatchController extends Controller
{
    public function index()
    {
        $matches = Matche::all();
        $teams = Team::all();
        $stadiums = Stadium::all();
        return view('matches.index', compact('matches','teams', 'stadiums'));
    }

    public function create()
    {
        $teams = Team::all();
        $stadiums = Stadium::all();
        return view('matches.index', compact('teams', 'stadiums'));
    }

    public function store(Request $request)
    {
        Matche::create($request->all());
        return redirect()->route('matches.index')->with('success', 'Match created successfully.');
    }


    public function edit(Matche $match)
{
    $teams = Team::all();
    $stadiums = Stadium::all();
    return view('matches.edit', compact('match', 'teams', 'stadiums'));
}

public function update(Request $request, Matche $match)
{
    $match->update($request->all());
    return redirect()->route('matches.index')->with('success', 'Match updated successfully.');
}

public function destroy(Matche $match)
{
    $match->delete();
    return redirect()->route('matches.index')->with('success', 'Match deleted successfully.');
}

public function create_result($matchId)
{
    $match = Matche::findOrFail($matchId);

    return view('matches.add_scores', compact('matchId', 'match'));
}



    public function store_result(Request $request, $matchId)
    {
        $validatedData = $request->validate([
            'team1_score' => 'required|integer|min:0',
            'team2_score' => 'required|integer|min:0',
        ]);

        Match_results::create([
            'match_id' => $matchId,
            'team1_score' => $validatedData['team1_score'],
            'team2_score' => $validatedData['team2_score'],
            'result' => $this->calculateResult($validatedData['team1_score'], $validatedData['team2_score']),
        ]);

        return redirect()->route('matches.index')->with('success', 'Scores added successfully.');
    }

    private function calculateResult($team1Score, $team2Score)
    {
        // Vous pouvez ajouter votre logique pour déterminer le résultat du match ici
        // Par exemple, si $team1Score > $team2Score, alors "Team 1 Wins", etc.
        // Je vais laisser cela comme une simple logique de comparaison pour l'exemple

        if ($team1Score > $team2Score) {
            return 'Team 1 Wins';
        } elseif ($team1Score < $team2Score) {
            return 'Team 2 Wins';
        } else {
            return 'Draw';
        }
    }

    public function show($id)
    {
       
        $matchResult = Match_results::findOrFail($id);

        // Retourner la vue avec les détails du résultat du match
        return view('matches.show', ['matchResult' => $matchResult]);
    }

    public function showResults()
    {
        // Récupérer tous les matchs avec les résultats
        $matches = Matche::has('matchResults')->get();

        // Retourner la vue avec les données des matchs
        return view('matches.results', ['matches' => $matches]);
    }
}
