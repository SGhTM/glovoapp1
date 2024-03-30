@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col">
                <h2 class="text-center">Liste des Articles</h2>
            </div>
        </div>
    </div>
    <style>
        .menu-list {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-between;
        }

        .menu-item {
            flex-basis: calc(33.33% - 20px); /* Adjust the width of each menu item */
            margin-bottom: 20px; /* Add some bottom margin to separate menu items */
        }
    </style>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <a href="{{route('menus.create')}}" class="btn btn-primary mb-3">Ajouter Menu</a>
                <div class="menu-list">
                    @foreach ($menus as $menu)
                        <div class="menu-item">
                            <div class="menu-item-info">
                                <h3>{{$menu->article}}</h3>
                                <p>Prix: {{$menu->prix}} DH</p>
                                <p>Shop: {{$menu->shop->nom_shop}}</p>
                            </div>
                            <div class="menu-item-photo">
                                <img src="{{ $menu->photo }}" class="menu-item-image" alt="{{ $menu->article }}">
                            </div>
                            <div class="menu-item-actions">
                                <form action="{{ route('menus.destroy',$menu->id) }}" method="POST">
                                    <a class="btn btn-primary" href="{{ route('menus.edit',$menu->id) }}">Edit</a>
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">Delete</button>
                                </form>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection
