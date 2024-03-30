@extends('layouts.add')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Ajouter Catalogue</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('catalogues.store') }}" enctype="multipart/form-data">
                            @csrf

                            <div class="form-group">
                                <label for="nom_cat"><strong>Nom Catalogue:</strong></label>
                                <input type="text" class="form-control" id="nom_cat" name="nom_cat" required>
                                @error('nom_cat')
                                <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                            @enderror 
                            </div>

                            <div class="form-group">
                                <label for="photo"><strong>Catalogue Photo:</strong></label>
                                <input type="file" class="form-control-file" id="photo" name="photo" required accept="image/*">
                                @error('photo')
                                <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                            @enderror 
                            </div>

                            <button type="submit" class="btn btn-primary">Submit</button><a class="btn btn-primary" href="{{route('catalogues.index')}}">Annuler</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
