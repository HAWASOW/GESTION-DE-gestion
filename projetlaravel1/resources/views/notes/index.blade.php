@extends('layouts.app')

@section('content')
<h1>Liste des Notes</h1>
<a href="{{ route('notes.create') }}" class="btn btn-primary">Ajouter Note</a>
<table>
    <thead>
        <tr>
            <th>Étudiant</th>
            <th>Cours</th>
            <th>Valeur</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach($notes as $note)
        <tr>
            <td>{{ $note->etudiant->nom }}</td>
            <td>{{ $note->cours->nom }}</td>
            <td>{{ $note->valeur }}</td>
            <td>
                <a href="{{ route('notes.edit', $note) }}" class="btn btn-warning">Modifier</a>
                <form action="{{ route('notes.destroy', $note) }}" method="POST" style="display:inline;">
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