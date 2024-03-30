<?php
use App\Models\Shop;
$shops = Shop::all();
?>
@extends('layouts.add')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Ajouter Article</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('menus.store') }}" enctype="multipart/form-data">
                            @csrf

                            <div class="form-group">
                                <label for="article"><strong>Article :</strong></label>
                                <input type="text" class="form-control" id="article" name="article" required>
                                @error('article')
                                    <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                                @enderror 
                            </div>


                            <div class="form-group">
                                <label for="prix"><strong>Prix :</strong></label>
                                <input type="text" class="form-control" id="prix" name="prix" required>
                                @error('prix')
                                    <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                                @enderror
                            </div> 

                            <div class="form-group">
                                <strong>Shop :</strong>
                                <select name="shop_id" class="form-control" required>
                                    @foreach($shops as $shop)
                                        <option value="{{ $shop->id }}">{{ $shop->nom_shop }}</option>
                                    @endforeach
                                </select>
                                @error('shop_id')
                                    <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                                @enderror 
                            </div><br>

                            <div class="form-group">
                                <label for="photo"><strong>Menu Photo:</strong></label><br>
                                <input type="file" class="form-control-file" id="photo" name="photo" required accept="image/*">
                                @error('photo')
                                <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                            @enderror 
                            </div><br>

                            <button type="submit" class="btn btn-primary">Submit</button><a class="btn btn-primary" href="{{route('menus.index')}}">Annuler</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
