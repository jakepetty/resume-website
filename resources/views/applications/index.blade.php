@extends('layouts.backend')
@section('content')
<section class="container">
    <div class="btn-group float-right">
        <a href="{{ route('applications.create') }}" class="btn btn-outline-dark"><i class="fas fa-plus"></i> New Application</a>
    </div>
    <h2 class="mb-4">Application Management</h2>
    <table class="table table-borderless table-hover ui-sortable" data-url="{{ route('applications.reorder') }}">
        <thead class="thead-dark">
            <tr>
                <th>Application</th>
                <th class="text-right">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($applications as $application)
            <tr class="sortable" data-id="{{ $application->id }}">
                <td>{{ $application->name }}</td>
                <td>
                    <form class="form-inline float-right" action="{{ route('applications.destroy', $application->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this application?')">
                        @csrf @method('DELETE')
                        <div class="btn-group">
                            <a class="btn btn-outline-dark btn-sm" href="{{ route('applications.edit', $application->id) }}"><i class="fas fa-edit"></i> Edit</a>
                            <button class="btn btn-outline-dark btn-sm"><i class="fas fa-times"></i> Delete</button>
                        </div>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</section>
@endsection
