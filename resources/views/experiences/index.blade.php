@extends('layouts.backend')
@section('content')
<section class="container">
    <h2>Experience Management</h2>
    <table class="table table-borderless table-hover">
        <thead class="thead-dark">
            <tr>
                <th>@sortablelink('name', 'experience')</th>
                <th>@sortablelink('start_date', 'Date')</th>
                <th>@sortablelink('location', 'Location')</th>
                <th class="text-right">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($experiences as $experience)
            <tr>
                <td>{{ $experience->name }}</td>
                <td>{{ $experience->start_date }} - {{ $experience->end_date ? $experience->end_date : 'present' }}</td>
                <td>{{ $experience->location }}</td>
                <td>
                    <form class="form-inline float-right" action="{{ route('experiences.destroy', $experience->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this experience?')">
                        @csrf @method('DELETE')
                        <div class="btn-group">
                            <a class="btn btn-outline-dark btn-sm" href="{{ route('experiences.edit', $experience->id) }}"><i class="fas fa-edit"></i> Edit</a>
                            <button class="btn btn-outline-dark btn-sm"><i class="fas fa-times"></i> Delete</button>
                        </div>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    {{ $experiences->appends(\Request::except('page'))->links() }}
    <a href="{{ route('experiences.create') }}" class="btn btn-outline-dark"><i class="fas fa-plus"></i> Add</a>
</section>
@endsection
