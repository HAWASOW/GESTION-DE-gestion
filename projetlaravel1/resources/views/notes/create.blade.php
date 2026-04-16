@extends('layouts.app')

@section('content')
<h1>Ajouter une Note</h1>
<form action="{{ route('notes.store') }}" method="POST">
    @csrf
    <div>
        <label>Étudiant:</label>
        <select name="etudiant_id" required>
            @foreach($etudiants as $etudiant)
                <option value="{{ $etudiant->id }}">{{ $etudiant->nom }}</option>
            @endforeach
        </select>
    </div>
    <div>
        <label>Cours:</label>
        <select name="cours_id" required>
            @foreach($cours as $cours)
                <option value="{{ $cours->id }}">{{ $cours->nom }}</option>
            @endforeach
        </select>
    </div>
    <div>
        <label>Valeur:</label>
        <input type="number" name="valeur" step="0.01" required>
    </div>
    <button type="submit">Ajouter</button>
</form>
@endsection