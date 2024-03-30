@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <a href="{{route('utilisateurs.create')}}" class="btn btn-primary">ajouter Utilisateur</a>
                <div class="card">
                    <div class="card-header">List of Utilisateurs</div>
                    
                    <div class="card-body">
                        @if (session('success'))
                            <div class="alert alert-success" role="alert">
                                {{ session('success') }}
                            </div>
                        @endif

                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Nom</th>
                                    <th>Prénom</th>
                                    <th>Adresse</th>
                                    <th>Ville</th>
                                    <th>Email</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($utilisateurs as $utilisateur)
                                    <tr>
                                        <td>{{ $utilisateur->nom }}</td>
                                        <td>{{ $utilisateur->prenom }}</td>
                                        <td>{{ $utilisateur->adresse }}</td>
                                        <td>{{ $utilisateur->ville }}</td>
                                        <td>{{ $utilisateur->email }}</td>
                                        <td>
                                            <a href="{{ route('utilisateurs.edit', $utilisateur->id) }}" class="btn btn-primary">Edit</a>
                                            <form action="{{ route('utilisateurs.destroy', $utilisateur->id) }}" method="POST" style="display: inline-block;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger">Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
