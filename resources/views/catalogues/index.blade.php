@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <a href="{{ route('catalogues.create') }}" class="btn btn-success">Ajouter Catalogue</a>
            </div>
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Catalogues</div>

                    <div class="card-body">
                        <div class="row">
                            @foreach($catalogues as $catalogue)
                                <div class="col-md-4 mb-3">
                                    <div class="card">
                                        <a href="{{route('shops.index', ['catalogue_id' => $catalogue->id])}}"><img src="{{ $catalogue->photo }}" class="card-img-top" alt="{{ $catalogue->nom_cat }}">
                                        <div class="card-body">
                                            <h5 class="card-title">{{ $catalogue->nom_cat }}</h5><br>
                                            <!-- Edit and Delete buttons -->
                                            <div class="btn-group" role="group">
                                                <a href="{{ route('catalogues.edit', $catalogue->id) }}" class="btn btn-primary">Edit</a>
                                                <form action="{{ route('catalogues.destroy', $catalogue->id) }}" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger">Delete</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div></a>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
