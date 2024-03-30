@extends('layouts.add')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 offset-md-2">
                <div class="card">
                    <div class="card-header">Edit Mode Reglement</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('modes.update', $mode->id) }}">
                            @csrf
                            @method('PUT')

                            <div class="form-group">
                                <label for="mode">Mode:</label>
                                <input type="text" name="mode" id="mode" class="form-control" value="{{ $mode->mode }}" required>
                            </div>

                            <button type="submit" class="btn btn-primary">Update Mode</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
