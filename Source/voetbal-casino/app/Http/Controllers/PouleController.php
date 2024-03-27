<?php

namespace App\Http\Controllers;

use App\Models\Poule;
use App\Models\User;
use App\Models\Prediction;
use Illuminate\Http\Request;

class PouleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $poules = Poule::with('users')->get(); // Assuming you want to eager load the users relationship

        return view('poule.index', ['poules' => $poules]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $users = User::all(); // Fetch all users (adjust this query based on your needs)
        
        return view('poule.create', ['users' => $users]);
    }

    public function joinOrLeave(Poule $poule)
    {
        $user = auth()->user();

        // Check if the user is already in the Poule
        if ($user->poules->contains($poule)) {
            $user->poules()->detach($poule->id);
            return redirect()->route('poule.index')->with('success', 'You have left the Poule.');
        }

        // If not, proceed to join the Poule
        $user->poules()->attach($poule->id);

        return redirect()->route('poule.index')->with('success', 'You have joined the Poule.');
    }

    public function voorspel(Poule $poule)
    {
        // Your logic for the 'voorspel.blade.php' page
        return view('poule.voorspel', compact('poule'));
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'user_ids' => 'array',
        ]);

        $poule = Poule::create(['title' => $validatedData['title']]);

        if (isset($validatedData['user_ids'])) {
            $poule->users()->attach($validatedData['user_ids']);
        }

        return redirect()->route('poule.index');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $poule = Poule::find($id);
        return view('poule.show', compact('poule'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Poule $poule)
    {
        return view('poule.edit',compact('poule'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Poule $poule)
    {
        $request->validate([
            
            ]);
            
            $poule->update($request->all());

            return redirect()->route('poule.index')
            ->with('success','De poule is gewijzigd');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Poule $poule)
    {
        $poule->delete();

        return redirect()->route('poule.index')
        ->with('success','De poule is verwijderd');
    }
}

