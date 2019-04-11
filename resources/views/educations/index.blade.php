@extends('layouts.backend')
@section('content')
<section class="container">
    <h2>Education Management</h2>
    <table class="table table-borderless table-hover">
        <thead class="thead-dark">
            <tr>
                <th>@sortablelink('name', 'School')</th>
                <th>@sortablelink('major', 'Major')</th>
                <th>@sortablelink('location', 'Location')</th>
                <th>@sortablelink('year', 'Year')</th>
                <th class="text-right">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($educations as $education)
            <tr>
                <td>{{ $education->name }}</td>
                <td>{{ $education->major }}</td>
                <td>{{ $education->location }}</td>
                <td>{{ $education->year }}</td>
                <td>
                    <form class="form-inline float-right" action="{{ route('educations.destroy', $education->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this education?')">
                        @csrf @method('DELETE')
                        <div class="btn-group">
                            <a class="btn btn-outline-dark btn-sm" href="{{ route('educations.edit', $education->id) }}"><i class="fas fa-edit"></i> Edit</a>
                            <button class="btn btn-outline-dark btn-sm"><i class="fas fa-times"></i> Delete</button>
                        </div>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    {{ $educations->appends(\Request::except('page'))->links() }}
    <a href="{{ route('educations.create') }}" class="btn btn-outline-dark"><i class="fas fa-plus"></i> Add</a>
</section>
@endsection
