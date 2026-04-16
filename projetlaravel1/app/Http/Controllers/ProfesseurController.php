<?php

namespace App\Http\Controllers;

use App\Models\Professeur;
use Illuminate\Http\Request;

class ProfesseurController extends Controller
{
    public function index()
    {
        $professeurs = Professeur::all();
        return view('professeurs.index', compact('professeurs'));
    }

    public function create()
    {
        return view('professeurs.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nom' => 'required',
            'email' => 'required|email|unique:professeurs',
            'matiere' => 'required',
        ]);
        Professeur::create($request->all());
        return redirect()->route('professeurs.index')->with('success', 'Professeur ajouté avec succès.');
    }

    public function edit(Professeur $professeur)
    {
        return view('professeurs.edit', compact('professeur'));
    }

    public function update(Request $request, Professeur $professeur)
    {
        $request->validate([
            'nom' => 'required',
            'email' => 'required|email|unique:professeurs,email,' . $professeur->id,
            'matiere' => 'required',
        ]);
        $professeur->update($request->all());
        return redirect()->route('professeurs.index')->with('success', 'Professeur modifié avec succès.');
    }

    public function destroy(Professeur $professeur)
    {
        $professeur->delete();
        return redirect()->route('professeurs.index')->with('success', 'Professeur supprimé avec succès.');
    }
}
