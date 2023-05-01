@extends('layouts.app')

@section('content')
<div class="container mt-2">
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left mb-2">
                <h2>Education List</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('educations.create') }}"> Add New Education</a>
            </div>
        </div>
    </div>
    @if ($message = Session::get('success'))
    <div class="alert alert-success">
        <p>{{ $message }}</p>
    </div>
    @endif
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>No</th>
                <th>Name</th>
                <th>Field of Study</th>
                <th>Date Start</th>
                <th>Date Finish</th>
                <th>Logo</th>
                <th width="280px">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($educations as $education)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $education->institution_name }}</td>
                <td>{{ $education->field_of_study }}</td>
                <td>{{ $education->start_date->format('M Y') }}</td>
                <td>{{ $education->end_date->format('M Y') }}</td>
                <td>
                    @if($education->education_logo)
                    <img src="{{ asset('storage/uploads/education_logos/' . $education->education_logo) }}" alt="{{ $education->name }}" style="max-width: 100px;">
                    @else
                    No logo
                    @endif
                </td>
                <td>
                    <form action="{{ route('educations.destroy',$education->id) }}" method="POST">
                        <a class="btn btn-primary" href="{{ route('educations.edit',$education->id) }}">Edit</a>
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    {!! $educations->links() !!}
</div>
@endsection
