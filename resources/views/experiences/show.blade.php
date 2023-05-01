@extends('layouts.app')

@section('content')
    <div class="container mt-2">
        <div class="row">
            <div class="col-lg-12 margin-tb">
                <div class="pull-left">
                    <h2>{{ $experience->title }}</h2>
                </div>
                <div class="pull-right">
                    <a class="btn btn-primary" href="{{ route('experiences.index') }}">Back</a>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Place :</strong>
                    <input type="text" class="form-control" name="subtitle" value="{{ $experience->subtitle }}" readonly>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Date Start:</strong>
                    <input type="text" class="form-control" name="start_date" value="{{ $experience->start_date->format('F Y') }}" readonly>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Date End:</strong>
                    <input type="text" class="form-control" name="end_date" value="{{ $experience->end_date->format('F Y') }}" readonly>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Summary:</strong>
                    <textarea class="form-control" name="paragraph" readonly rows="{{ ceil(strlen($experience->paragraph) / 80) }}">{{ $experience->paragraph }}</textarea>
                </div>
            </div>
        </div>
    </div>
@endsection
