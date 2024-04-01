<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Team;

class TeamController extends Controller
{
    /**
     * Affiche une liste de toutes les équipes.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $teams = Team::all();
        return response()->view('teams.index', compact('teams'));
    }

    /**
     * Affiche le formulaire de création d'une nouvelle équipe.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('teams.create');
    }

    /**
     * Stocke une nouvelle équipe dans la base de données.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'country' => 'required|string',
            'flag' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Ajout de la validation pour le drapeau
        ]);
    
        $teamData = $request->except('flag');
    
        // Traitement de l'image du drapeau
        if ($request->hasFile('flag')) {
            $image = $request->file('flag');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('flags'), $imageName);
            $teamData['flag'] = 'flags/' . $imageName;
        }
    
        Team::create($teamData);
    
        return redirect()->route('teams.index')
                         ->with('success', 'Équipe créée avec succès.');
    }
    
    
}
