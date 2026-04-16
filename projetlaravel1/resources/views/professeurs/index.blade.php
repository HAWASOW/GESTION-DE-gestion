@extends('layouts.app')

@section('content')
<h1>Liste des Professeurs</h1>
<a href="{{ route('professeurs.create') }}" class="btn btn-primary">Ajouter Professeur</a>
<table>
    <thead>
        <tr>
            <th>Nom</th>
            <th>Email</th>
            <th>Matière</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach($professeurs as $professeur)
        <tr>
            <td>{{ $professeur->nom }}</td>
            <td>{{ $professeur->email }}</td>
            <td>{{ $professeur->matiere }}</td>
            <td>
                <a href="{{ route('professeurs.edit', $professeur) }}" class="btn btn-warning">Modifier</a>
                <form action="{{ route('professeurs.destroy', $professeur) }}" method="POST" style="display:inline;">
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