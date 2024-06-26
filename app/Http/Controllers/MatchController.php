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

        $validatedData = $request->validate([
            'stadium_id' => 'required|exists:stadiums,id', 
            
        ]);

        $match = new Matche();
        $match->team1_id = $request->input('team1_id');
        $match->team2_id = $request->input('team2_id');
        $match->date = $request->input('date');
        $match->price = $request->input('price');
        $match->stadium_id = $validatedData['stadium_id']; 


        $stadium = Stadium::findOrFail($validatedData['stadium_id']);
        $match->available_seats = $stadium->capacity;

        $match->save();

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
       
        $matches =  Matche::has('matchResults')->findOrFail($id);

     
        return view('matches.show', ['matches' => $matches]);
    }

    public function showResults()
    {

        $matches = Matche::has('matchResults')->get();

 
        return view('matches.results', ['matches' => $matches]);
    }
}
