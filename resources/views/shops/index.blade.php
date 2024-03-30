@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <a href="{{ route('shops.create') }}" class="btn btn-success">Ajouter Shop</a>
            </div>
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Shops</div>

                    <div class="card-body">
                        <div class="row">
                            @foreach($shops as $shop)
                            <a href="{{ route('menus.index',['shop_id' => $shop->id]) }}"><div class="col-md-4 mb-3">
                                    <div class="card">
                                        <img src="{{ $shop->photo }}" class="card-img-top" alt="{{ $shop->nom_shop }}">
                                        <div class="card-body">
                                            <h5 class="card-title">{{ $shop->nom_shop }}</h5><br>
                                            <!-- Edit and Delete buttons -->
                                            <div class="btn-group" role="group">
                                                <a href="{{ route('shops.edit', $shop->id) }}" class="btn btn-primary">Edit</a>
                                                <form action="{{ route('shops.destroy', $shop->id) }}" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger">Delete</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div></a>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
