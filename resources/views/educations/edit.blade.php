@extends('layouts.app')

@section('content')
<div class="container mt-2">
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left mb-2">
                <h2>Edit Education</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('educations.index') }}"> Back</a>
            </div>
        </div>
    </div>
    @if(session('status'))
    <div class="alert alert-success mb-1 mt-1">
        {{ session('status') }}
    </div>
    @endif
    <form action="{{ route('educations.update', $education->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Educational Institution Name:</strong>
                    <input type="text" name="institution_name" value="{{ $education->institution_name }}" class="form-control" placeholder="Educational Institution Name">
                    @error('institution_name')
                    <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Field of Study/Major:</strong>
                    <input type="text" name="field_of_study" value="{{ $education->field_of_study }}" class="form-control" placeholder="Field of Study/Major">
                    @error('field_of_study')
                    <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Date Start:</strong>
                    <input type="month" name="start_date" value="{{ $education->start_date->format('Y-m') }}" class="form-control" placeholder="Date Start">
                    @error('start_date')
                    <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Date End:</strong>
                    <input type="month" name="end_date" value="{{ $education->end_date->format('Y-m') }}" class="form-control" placeholder="Date End">
                    @error('end_date')
                    <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    {{-- <strong>Logo:</strong>
                    <input type="file" name="education_logo" class="form-control">
                    @error('logo')
                    <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                    @enderror --}}
                    <strong>Logo:</strong>
                    @if($education->education_logo)
                    <br>
                    <img src="{{ asset('storage/uploads/education_logos/' . $education->education_logo) }}" alt="Logo" style="max-height: 100px;">
                    <br>
                    @endif
                    <input type="file" name="logo" class="form-control-file">
                    @error('logo')
                    <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <button type="submit" class="btn btn-primary ml-3">Submit</button>
            </div>

        </div>
    </form>
</div>
@endsection
