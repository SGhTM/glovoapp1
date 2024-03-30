<?php
use App\Models\Utilisateur;
use App\Models\Menu;

$utilisateurs = Utilisateur::all();
$menus = Menu::all();
?>
@extends('layouts.add')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 offset-md-2">
                <div class="card">
                    <div class="card-header">Edit Panier</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('paniers.update', $paniers->id) }}">
                            @csrf
                            @method('PUT')

                            <div class="form-group">
                                <label for="date">Date:</label>
                                <input type="date" name="date" id="date" class="form-control" value="{{ $paniers->date }}" required>
                            </div>

                            <div class="form-group">
                                <label for="heure">Heure:</label>
                                <input type="time" name="heure" id="heure" class="form-control" value="{{ $paniers->heure }}" required>
                            </div>

                            <div class="form-group">
                                <label for="utilisateur_id">Utilisateur:</label>
                                <select name="utilisateur_id" id="utilisateur_id" class="form-control" required>
                                    @foreach ($utilisateurs as $utilisateur)
                                        <option value="{{ $utilisateur->id }}" {{ $paniers->utilisateur_id == $utilisateur->id ? 'selected' : '' }}>
                                            {{ $utilisateur->nom }} {{ $utilisateur->prenom }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="menu_id">Menu:</label>
                                <select name="menu_id" id="menu_id" class="form-control" required>
                                    @foreach ($menus as $menu)
                                        <option value="{{ $menu->id }}" {{ $paniers->menu_id == $menu->id ? 'selected' : '' }}>
                                            {{ $menu->article }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            <button type="submit" class="btn btn-primary">Update Panier</button><a href="{{ route('paniers.index') }}" class="btn btn-secondary">Cancel</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
