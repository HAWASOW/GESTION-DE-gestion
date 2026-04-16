@extends('layouts.app')

@section('content')
<h1>Ajouter un Cours</h1>
<form action="{{ route('cours.store') }}" method="POST">
    @csrf
    <div>
        <label>Nom:</label>
        <input type="text" name="nom" required>
    </div>
    <div>
        <label>Professeur:</label>
        <select name="professeur_id" required>
            @foreach($professeurs as $professeur)
                <option value="{{ $professeur->id }}">{{ $professeur->nom }}</option>
            @endforeach
        </select>
    </div>
    <button type="submit">Ajouter</button>
</form>
@endsection