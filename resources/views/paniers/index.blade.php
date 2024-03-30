@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <a href="{{route('paniers.create')}}" class="btn btn-primary mb-3">Ajouter Panier</a>
                    <div class="card-header">List of Paniers</div>

                    <div class="card-body">
                        @if (session('success'))
                            <div class="alert alert-success" role="alert">
                                {{ session('success') }}
                            </div>
                        @endif
                        @if (session('fail'))
                            <div class="alert alert-danger" role="alert">
                                {{ session('fail') }}
                            </div>
                        @endif

                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Date</th>
                                    <th>Heure</th>
                                    <th>Utilisateur ID</th>
                                    <th>Menu ID</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($paniers as $panier)
                                    <tr>
                                        <td>{{ $panier->date }}</td>
                                        <td>{{ $panier->heure }}</td>
                                        <td>{{ $panier->utilisateur->nom }} {{ $panier->utilisateur->prenom }}</td>
                                        <td>{{ $panier->menu->article }}</td>
                                        <td>
                                            <a href="{{ route('paniers.edit', $panier->id) }}" class="btn btn-primary">Edit</a>
                                            <form action="{{ route('paniers.destroy', $panier->id) }}" method="POST" style="display: inline-block;">
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
