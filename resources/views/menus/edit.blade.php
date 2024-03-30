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
                        <form method="POST" action="{{ route('menus.update', $menu->id) }}" >
                            @csrf
                            @method('put')
                            <div class="form-group">
                                <label for="article"><strong>Article :</strong></label>
                                <input type="text" class="form-control" id="article" name="article" value="{{$menu->article}}" required>
                                @error('article')
                                    <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                                @enderror 
                            </div>

                            <div class="form-group">
                                <label for="prix"><strong>Prix :</strong></label>
                                <input type="text" class="form-control" id="prix" name="prix" value="{{$menu->prix}}" required>
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
                                <label for="photo"><strong>Catalogue Photo:</strong></label>
                                <input type="file" class="form-control-file" id="photo" name="photo" accept="image/*">
                                @if($menu->photo)
                                    <img src="{{ $menu->photo }}" class="img-fluid mt-2" alt="{{ $menu->nom_shop }}">
                                @endif
                                @error('photo')
                                <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                            @enderror 
                            </div>

                            <button type="submit" class="btn btn-primary">Submit</button><a class="btn btn-primary" href="{{route('menus.index')}}">Annuler</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
