@extends('layouts.app')

@section('content')
<h1>Liste des Étudiants</h1>
<a href="{{ route('etudiants.create') }}" class="btn btn-primary">Ajouter Étudiant</a>
<table>
    <thead>
        <tr>
            <th>Nom</th>
            <th>Email</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach($etudiants as $etudiant)
        <tr>
            <td>{{ $etudiant->nom }}</td>
            <td>{{ $etudiant->email }}</td>
            <td>
                <a href="{{ route('etudiants.edit', $etudiant) }}" class="btn btn-warning">Modifier</a>
                <form action="{{ route('etudiants.destroy', $etudiant) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Supprimer</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection