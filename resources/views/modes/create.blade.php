@extends('layouts.add')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 offset-md-2">
                <div class="card">
                    <div class="card-header">Add Mode Reglement</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('mode_reglements.store') }}">
                            @csrf

                            <div class="form-group">
                                <label for="mode">Mode:</label>
                                <input type="text" name="mode" id="mode" class="form-control" required>
                            </div>

                            <button type="submit" class="btn btn-primary">Add Mode</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
