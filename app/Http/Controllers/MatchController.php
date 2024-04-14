<?php

namespace App\Http\Controllers;


use App\Models\Matche;
use App\Models\Team;
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

}
