@extends('layouts.app')

@section('content')
    <div class="container mt-2">
        <div class="row">
            <div class="col-lg-12 margin-tb">
                <div class="pull-left">
                    <h2>Skillsets</h2>
                </div>
                <div class="pull-right mb-2">
                    <a class="btn btn-success" href="{{ route('skills.create') }}"> Create Skill</a>
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
                    <th>S.No</th>
                    <th>Skill Name</th>
                    <th>Skill Value</th>
                    <th width="280px">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($skills as $skill)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $skill->name }}</td>
                        <td>{{ $skill->value }}</td>
                        <td>
                            <form action="{{ route('skills.destroy', $skill->id) }}" method="POST">
                                <a class="btn btn-primary" href="{{ route('skills.edit', $skill->id) }}">Edit</a>
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        {!! $skills->links() !!}
    </div>
@endsection
