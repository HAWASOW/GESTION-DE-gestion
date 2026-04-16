<?php

namespace App\Http\Controllers;

use App\Models\Cours;
use App\Models\Professeur;
use Illuminate\Http\Request;

class CoursController extends Controller
{
    public function index()
    {
        $cours = Cours::with('professeur')->get();
        return view('cours.index', compact('cours'));
    }

    public function create()
    {
        $professeurs = Professeur::all();
        return view('cours.create', compact('professeurs'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nom' => 'required',
            'professeur_id' => 'required|exists:professeurs,id',
        ]);
        Cours::create($request->all());
        return redirect()->route('cours.index')->with('success', 'Cours ajouté avec succès.');
    }

    public function edit(Cours $cours)
    {
        $professeurs = Professeur::all();
        return view('cours.edit', compact('cours', 'professeurs'));
    }

    public function update(Request $request, Cours $cours)
    {
        $request->validate([
            'nom' => 'required',
            'professeur_id' => 'required|exists:professeurs,id',
        ]);
        $cours->update($request->all());
        return redirect()->route('cours.index')->with('success', 'Cours modifié avec succès.');
    }

    public function destroy(Cours $cours)
    {
        $cours->delete();
        return redirect()->route('cours.index')->with('success', 'Cours supprimé avec succès.');
    }
}
