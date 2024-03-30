@extends('layouts.add')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 offset-md-2">
                <div class="card">
                    <div class="card-header">Create New Utilisateur</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('utilisateurs.store') }}">
                            @csrf

                            <div class="form-group">
                                <label for="nom">Nom:</label>
                                <input type="text" name="nom" id="nom" class="form-control" required>
                                @error('nom')
                                    <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="prenom">Prénom:</label>
                                <input type="text" name="prenom" id="prenom" class="form-control" required>
                                @error('prenom')
                                    <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="adresse">Adresse:</label>
                                <input type="text" name="adresse" id="adresse" class="form-control" required>
                                @error('adresse')
                                    <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="ville">Ville:</label>
                                <input type="text" name="ville" id="ville" class="form-control" required>
                                @error('ville')
                                    <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="email">Email:</label>
                                <input type="email" name="email" id="email" class="form-control" required>
                                @error('email')
                                    <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="password">Password:</label>
                                <input type="password" name="password" id="password" class="form-control" required>
                                @error('password')
                                    <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="password">Confirm Password:</label>
                                <input type="password" name="password_confirmation" id="password" class="form-control" required>
                            </div>

                            <button type="submit" class="btn btn-primary">Create Utilisateur</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
