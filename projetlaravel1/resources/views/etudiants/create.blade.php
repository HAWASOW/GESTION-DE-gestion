@extends('layouts.app')

@section('content')
<h1>Ajouter un Étudiant</h1>
<form action="{{ route('etudiants.store') }}" method="POST">
    @csrf
    <div>
        <label>Nom:</label>
        <input type="text" name="nom" required>
    </div>
    <div>
        <label>Email:</label>
        <input type="email" name="email" required>
    </div>
    <button type="submit">Ajouter</button>
</form>
@endsection