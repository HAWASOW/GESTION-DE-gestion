<?php

namespace App\Http\Controllers;

use App\Models\Note;
use App\Models\Etudiant;
use App\Models\Cours;
use Illuminate\Http\Request;

class NoteController extends Controller
{
    public function index()
    {
        $notes = Note::with(['etudiant', 'cours'])->get();
        return view('notes.index', compact('notes'));
    }

    public function create()
    {
        $etudiants = Etudiant::all();
        $cours = Cours::all();
        return view('notes.create', compact('etudiants', 'cours'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'valeur' => 'required|numeric',
            'etudiant_id' => 'required|exists:etudiants,id',
            'cours_id' => 'required|exists:cours,id',
        ]);
        Note::create($request->all());
        return redirect()->route('notes.index')->with('success', 'Note ajoutée avec succès.');
    }

    public function edit(Note $note)
    {
        $etudiants = Etudiant::all();
        $cours = Cours::all();
        return view('notes.edit', compact('note', 'etudiants', 'cours'));
    }

    public function update(Request $request, Note $note)
    {
        $request->validate([
            'valeur' => 'required|numeric',
            'etudiant_id' => 'required|exists:etudiants,id',
            'cours_id' => 'required|exists:cours,id',
        ]);
        $note->update($request->all());
        return redirect()->route('notes.index')->with('success', 'Note modifiée avec succès.');
    }

    public function destroy(Note $note)
    {
        $note->delete();
        return redirect()->route('notes.index')->with('success', 'Note supprimée avec succès.');
    }
}
