@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <a href="{{ route('modes.create') }}" class="btn btn-success">Add Mode</a>
                    <div class="card-header">Mode Reglements List</div>

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
                                    <th>Mode</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($modes as $mode)
                                    <tr>
                                        <td>{{ $mode->id }}</td>
                                        <td>{{ $mode->mode }}</td>
                                        <td>
                                            <a href="{{ route('modes.edit', $mode->id) }}" class="btn btn-sm btn-primary">Edit</a>
                                            <form action="{{ route('modes.destroy', $mode->id) }}" method="POST" style="display: inline-block;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure you want to delete this mode?')">Delete</button>
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
