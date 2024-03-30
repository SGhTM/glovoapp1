<?php
use App\Models\Catalogue;
$catalogues = Catalogue::all();
?>
@extends('layouts.add')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Ajouter Shop</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('shops.store') }}" enctype="multipart/form-data">
                            @csrf

                            <div class="form-group">
                                <div class="form-group">
                                    <label for="nom_shop">Shop Name</label>
                                    <input type="text" class="form-control" id="nom_shop" name="nom_shop" required>
                                @error('nom_shop')
                                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                                @enderror 
                            </div>

                            <div class="form-group">
                                <label for="photo"><strong>Catalogue Photo</strong></label><br>
                                <input type="file" class="form-control-file" id="photo" name="photo" required accept="image/*">
                                @error('photo')
                                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                                @enderror 
                            </div>

                            <div class="form-group">
                                <strong>Catalogue :</strong>
                                <select name="catalogue_id" class="form-control" required>
                                    @foreach($catalogues as $catalogue)
                                        <option value="{{ $catalogue->id }}">{{ $catalogue->nom_cat }}</option>
                                    @endforeach
                                </select>
                                @error('catalogue_id')
                                    <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                                @enderror 
                            </div><br>

                            <button type="submit" class="btn btn-primary">Submit</button><a class="btn btn-primary" href="{{route('shops.index')}}">Annuler</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
