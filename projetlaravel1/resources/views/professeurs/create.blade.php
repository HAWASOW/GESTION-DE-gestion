@extends('layouts.app')

@section('content')
<h1>Ajouter un Professeur</h1>
<form action="{{ route('professeurs.store') }}" method="POST">
    @csrf
    <div>
        <label>Nom:</label>
        <input type="text" name="nom" required>
    </div>
    <div>
        <label>Email:</label>
        <input type="email" name="email" required>
    </div>
    <div>
        <label>Matière:</label>
        <input type="text" name="matiere" required>
    </div>
    <button type="submit">Ajouter</button>
</form>
@endsection