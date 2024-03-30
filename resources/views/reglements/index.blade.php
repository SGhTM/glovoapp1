@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <a href="{{ route('reglements.create') }}" class="btn btn-success">Add Reglement</a>
                    <div class="card-header">Reglements List</div>

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
                                    <th>Montant</th>
                                    <th>Detail ID</th>
                                    <th>Mode ID</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($reglements as $reglement)
                                    <tr>
                                        <td>{{ $reglement->id }}</td>
                                        <td>{{ $reglement->montant }}</td>
                                        <td>{{ $reglement->detail_id }}</td>
                                        <td>{{ $reglement->mode_id }}</td>
                                        <td>
                                            <a href="{{ route('reglements.edit', $reglement->id) }}" class="btn btn-sm btn-primary">Edit</a>
                                            <form action="{{ route('reglements.destroy', $reglement->id) }}" method="POST" style="display: inline-block;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure you want to delete this reglement?')">Delete</button>
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
