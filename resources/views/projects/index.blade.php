@extends('layouts.backend')
@section('content')
    <section class="container">
        <h2>Project Management</h2>
        <table class="table table-borderless table-hover">
            <thead class="thead-dark">
            <tr>
                <th></th>
                <th>@sortablelink('name', 'Project Name')</th>
                <th class="text-right">Actions</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($projects as $project)
                <tr>
                    <td><img src="/images/projects/{{ $project->github_id ? $project->github_id : $project->id }}.jpg" width=50 /></td>
                    <td>{{ $project->name }}</td>
                    <td>
                        <form class="form-inline float-right" action="{{ route('projects.destroy', $project->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this project?')">
                            @csrf @method('DELETE')
                            <div class="btn-group" role="group">
                                <a class="btn btn-outline-dark btn-sm" href="{{ route('projects.edit', $project->id) }}"><i class="fas fa-edit"></i> Edit</a>
                                <a class="btn btn-outline-dark btn-sm" href="{{ $project->url }}" target="_blank"><i class="fas fa-code"></i> Source</a>
                                <button class="btn btn-outline-dark btn-sm"><i class="fas fa-times"></i> Delete</button>
                            </div>
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        {{ $projects->appends(\Request::except('page'))->links() }}
        <a href="{{ route('projects.import') }}" class="btn btn-outline-dark"><i class="fab fa-github"></i> Import from GitHub</a>
        <a href="{{ route('projects.create') }}" class="btn btn-outline-dark"><i class="fas fa-plus"></i> Add</a>
    </section>
@endsection
