@extends('layouts.app')

@section('content')
<h1>Liste des Cours</h1>
<a href="{{ route('cours.create') }}" class="btn btn-primary">Ajouter Cours</a>
<table>
    <thead>
        <tr>
            <th>Nom</th>
            <th>Professeur</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach($cours as $cours)
        <tr>
            <td>{{ $cours->nom }}</td>
            <td>{{ $cours->professeur->nom }}</td>
            <td>
                <a href="{{ route('cours.edit', $cours) }}" class="btn btn-warning">Modifier</a>
                <form action="{{ route('cours.destroy', $cours) }}" method="POST" style="display:inline;">
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