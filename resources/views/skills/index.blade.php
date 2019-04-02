@extends('layouts.backend')
@section('content')
<section class="container">
    <h2>Skill Management</h2>
    <table class="table table-borderless table-hover">
        <thead class="thead-dark">
            <tr>
                <th>@sortablelink('name', 'Skill')</th>
                <th>@sortablelink('start_date', 'Start Date')</th>
                <th>@sortablelink('end_date', 'End Date')</th>
                <th>@sortablelink('level', 'Proficiency')</th>
                <th class="text-right">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($skills as $skill)
            <tr>
                <td>{{ $skill->name }}</td>
                <td>{{ $skill->start_date }}</td>
                <td>{{ $skill->end_date }}</td>
                <td>{{ $skill->level }}%</td>
                <td>
                    <form class="form-inline float-right" action="{{ route('skills.destroy', $skill->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this skill?')">
                        @csrf @method('DELETE')
                        <div class="btn-group">
                            <a class="btn btn-outline-dark btn-sm" href="{{ route('skills.edit', $skill->id) }}"><i class="fas fa-edit"></i> Edit</a>
                            <button class="btn btn-outline-dark btn-sm"><i class="fas fa-times"></i> Delete</button>
                        </div>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    {{ $skills->appends(\Request::except('page'))->links() }}
    <a href="{{ route('skills.create') }}" class="btn btn-outline-dark"><i class="fas fa-plus"></i> Add</a>
</section>
@endsection
