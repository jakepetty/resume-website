@extends('layouts.backend')
@section('content')
<section class="container">
    <h2>Experience Management</h2>
    <table class="table table-borderless table-hover">
        <thead class="thead-dark">
            <tr>
                <th>@sortablelink('name', 'resume_job')</th>
                <th>@sortablelink('start_date', 'Date')</th>
                <th>@sortablelink('location', 'Location')</th>
                <th class="text-right">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($resume_jobs as $resume_job)
            <tr>
                <td>{{ $resume_job->name }}</td>
                <td>{{ $resume_job->start_date }} - {{ $resume_job->end_date ? $resume_job->end_date : 'present' }}</td>
                <td>{{ $resume_job->location }}</td>
                <td>
                    <form class="form-inline float-right" action="{{ route('jobs.destroy', $resume_job->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this resume_job?')">
                        @csrf @method('DELETE')
                        <div class="btn-group">
                            <a class="btn btn-outline-dark btn-sm" href="{{ route('jobs.edit', $resume_job->id) }}"><i class="fas fa-edit"></i> Edit</a>
                            <button class="btn btn-outline-dark btn-sm"><i class="fas fa-times"></i> Delete</button>
                        </div>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    {{ $resume_jobs->appends(\Request::except('page'))->links() }}
    <a href="{{ route('jobs.create') }}" class="btn btn-outline-dark"><i class="fas fa-plus"></i> Add</a>
</section>
@endsection
