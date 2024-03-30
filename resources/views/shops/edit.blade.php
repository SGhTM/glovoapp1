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
                    <div class="card-header">Add Catalogue</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('shops.update', $shop->id) }}" enctype="multipart/form-data">
                            @csrf
                            @method('put')
                            <div class="form-group">
                                <label for="nom_cat">Shop Name</label>
                                <input type="text" class="form-control" id="nom_shop" name="nom_shop" value="{{$shop->nom_shop}}" required>
                                @error('nom_shop')
                                <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                            @enderror 
                            </div>

                            <div class="form-group">
                                <label for="photo">Shop Photo</label>
                                <input type="file" class="form-control-file" id="photo" name="photo" required value="{{$shop->photo}}" accept="image/*">
                                @error('photo')
                                <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                            @enderror 
                            </div>

                            <div class="form-group">
                                <strong>Catalogue :</strong>
                                <select name="catalogues_id" class="form-control" required>
                                    @foreach($catalogues as $catalogue)
                                        <option value="{{ $catalogue->id }}">{{ $catalogue->nom_cat }}</option>
                                    @endforeach
                                </select>
                            </div><br>

                            <button type="submit" class="btn btn-primary">Enregistrer</button><a class="btn btn-primary" href="{{route('shops.index')}}">Annuler</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
