<?php
use App\Models\Panier;
use App\Models\Menu;
$paniers = Panier::all();
$menus = Menu::all();
?>
@extends('layouts.add')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 offset-md-2">
            <div class="card">
                <div class="card-header">Edit Detail</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('details.update', $detail->id) }}">
                        @csrf
                        @method('PUT')

                        <div class="form-group">
                            <label for="qte">Quantity:</label>
                            <input type="number" name="qte" id="qte" class="form-control" value="{{ $detail->qte }}" required>
                        </div>

                        <div class="form-group">
                            <label for="panier_id">Panier:</label>
                            <select name="panier_id" id="panier_id" class="form-control" required>
                                @foreach ($paniers as $panier)
                                    <option value="{{ $panier->id }}" {{ $detail->panier_id == $panier->id ? 'selected' : '' }}>
                                        {{ $panier->id }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="menu_id">Menu:</label>
                            <select name="menu_id" id="menu_id" class="form-control" required>
                                @foreach ($menus as $menu)
                                    <option value="{{ $menu->id }}" {{ $detail->menu_id == $menu->id ? 'selected' : '' }}>
                                        {{ $menu->id }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <button type="submit" class="btn btn-primary">Update Detail</button><a href="{{ route('details.index') }}" class="btn btn-secondary">Cancel</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection