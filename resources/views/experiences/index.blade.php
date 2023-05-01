@extends('layouts.app')

@section('content')
    <div class="container mt-2">
        <div class="row">
            <div class="col-lg-12 margin-tb">
                <div class="pull-left">
                    <h2>Experiences</h2>
                </div>
                <div class="pull-right mb-2">
                    <a class="btn btn-success" href="{{ route('experiences.create') }}"> Create Experience</a>
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
                    <th>Experience Name</th>
                    <th>Experience Detail</th>
                    <th>Start Date</th>
                    <th>End Date</th>
                    <th>Summary</th>
                    <th width="280px">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($experiences as $experience)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $experience->title }}</td>
                        <td>{{ $experience->subtitle }}</td>
                        <td>{{ (new DateTime($experience->start_date))->format('F Y') }}</td>
                        <td>{{ (new DateTime($experience->end_date))->format('F Y') }}</td>
                        <td><p>...</p></td>
                        <td>
                            <form action="{{ route('experiences.destroy',$experience->id) }}" method="POST">
                                <a class="btn btn-info" href="{{ route('experiences.show',$experience->id) }}">Show</a>
                                <a class="btn btn-primary" href="{{ route('experiences.edit',$experience->id) }}">Edit</a>
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
            </tbody>
        </table>
        {!! $experiences->links() !!}
    </div>
@endsection
