@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <a href="{{ route('details.create') }}" class="btn btn-success">Ajouter Detail</a>
                    <div class="card-header">Details List</div>

                    <div class="card-body">
                        @if (session('success'))
                            <div class="alert alert-success">
                                {{ session('success') }}
                            </div>
                        @endif

                        @if (session('fail'))
                            <div class="alert alert-danger">
                                {{ session('fail') }}
                            </div>
                        @endif

                        <table class="table">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Quantity</th>
                                    <th>Panier date</th>
                                    <th>Panier heure</th>
                                    <th>Menu ID</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($details as $detail)
                                    <tr>
                                        <td>{{ $detail->id }}</td>
                                        <td>{{ $detail->qte }}</td>
                                        <td>{{ $detail->panier->date }}</td>
                                        <td>{{ $detail->panier->heure }}</td>
                                        <td>{{ $detail->menu->article }}</td>
                                        <td>
                                            <a href="{{ route('details.edit', $detail->id) }}" class="btn btn-sm btn-primary">Edit</a>
                                            <form action="{{ route('details.destroy', $detail->id) }}" method="POST" style="display: inline-block;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure you want to delete this detail?')">Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
