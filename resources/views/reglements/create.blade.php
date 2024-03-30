<?php
use App\Models\Detail_bl;
use App\Models\Mode;

$details = Detail_bl::all();
$modes = Mode::all();
?>
@extends('layouts.add')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 offset-md-2">
                <div class="card">
                    <div class="card-header">Add Reglement</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('reglements.store') }}">
                            @csrf

                            <div class="form-group">
                                <label for="montant">Montant:</label>
                                <input type="text" name="montant" id="montant" class="form-control" required>
                            </div>

                            <div class="form-group">
                                <label for="detail_id">Detail ID:</label>
                                <select name="detail_id" id="detail_id" class="form-control" required>
                                    @foreach ($details as $detail)
                                        <option value="{{ $detail->id }}">{{ $detail->qte }} {{ $detail->panier_id }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="mode_id">Mode ID:</label>
                                <select name="mode_id" id="mode_id" class="form-control" required>
                                    @foreach ($modes as $mode)
                                        <option value="{{ $mode->id }}">{{ $mode->mode }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <button type="submit" class="btn btn-primary">Add Reglement</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
