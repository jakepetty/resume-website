@extends('layouts.backend')
@section('content')
<section class="container">
    <table class="table">
        <thead>
            <tr>
                <th>@sortablelink('name', 'Skill')</th>
                <th>@sortablelink('start_date', 'Start Date')</th>
                <th>@sortablelink('end_date', 'End Date')</th>
                <th>@sortablelink('level')</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($skills as $skill)
            <tr>
                <td>{{ $skill->name }}</td>
                <td>{{ $skill->start_date }}</td>
                <td>{{ $skill->end_date }}</td>
                <td>{{ $skill->level }}</td>
                <td>
                    <form class="form-inline" action="{{ route('skills.destroy', $skill->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <a class="btn btn-primary" href="{{ route('skills.edit', $skill->id) }}">Edit</a>
                        <button class="btn btn-danger">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    {{ $skills->appends(\Request::except('page'))->links() }}
    <a href="{{ route('skills.create') }}" class="btn btn-primary"><i class="fas fa-plus"></i> Add</a>
</section>
@endsection
