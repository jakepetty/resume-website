@extends('layouts.backend')
@section('content')
<div class="container">
    <table class="table">
        <thead>
            <tr>
                <th>@sortablelink('name', 'Project Name')</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($projects as $project)
            <tr>
                <td>{{ $project->name }}</td>
                <td>
                    <form class="form-inline" action="{{ route('projects.destroy', $project->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <a class="btn btn-sm btn-primary" href="{{ route('projects.edit', $project->id) }}">Edit</a>
                        &nbsp;<button class="btn btn-sm btn-danger">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
{{ $projects->appends(\Request::except('page'))->links() }}
@endsection
