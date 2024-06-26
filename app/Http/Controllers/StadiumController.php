<?php


namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Stadium;

class StadiumController extends Controller
{
    public function index()
    {
        $stadiums = Stadium::all();
        return view('stadiums.index', compact('stadiums'));
    }

    

   

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'capacity' => 'required|integer',
            'address' => 'required',
        ]);

        Stadium::create($request->all());

        return redirect()->route('stadiums.index')->with('success', 'Stadium created successfully.');
    }

    public function edit($id)
{
    $stadium = Stadium::findOrFail($id);
    return view('stadiums.edit', compact('stadium'));
}
public function update(Request $request, $id)
{

    $validatedData = $request->validate([
        'name' => 'required|string|max:255',
        'capacity' => 'required|integer|min:0',
        'address' => 'required|string|max:255',
    ]);

   
    $stadium = Stadium::findOrFail($id);

    $stadium->update([
        'name' => $validatedData['name'],
        'capacity' => $validatedData['capacity'],
        'address' => $validatedData['address'],
    ]);


    return redirect()->route('stadiums.index')->with('success', 'Stadium updated successfully.');
}

public function destroy($id)
{
    $stadium = Stadium::findOrFail($id);
    $stadium->delete();
    
    return response()->json(['message' => 'Stadium deleted successfully']);
}   

}

