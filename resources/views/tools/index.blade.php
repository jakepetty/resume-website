@extends('layouts.backend')
@section('content')
<section class="container">
    <h2>Tool Management</h2>
    <table class="table table-borderless table-hover">
        <thead class="thead-dark">
            <tr>
                <th>@sortablelink('name', 'Name')</th>
                <th>@sortablelink('start_date', 'Start Year')</th>
                <th>@sortablelink('end_date', 'End Year')</th>
                <th>@sortablelink('level', 'Proficiency')</th>
                <th class="text-right">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($tools as $tool)
            <tr>
                <td>{{ $tool->name }}</td>
                <td>{{ $tool->start_date }}</td>
                <td>{{ $tool->end_date }}</td>
                <td>{{ $tool->level }}%</td>
                <td>
                    <form class="form-inline float-right" action="{{ route('tools.destroy', $tool->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this tool?')">
                        @csrf @method('DELETE')
                        <div class="btn-group">
                            <a class="btn btn-outline-dark btn-sm" href="{{ route('tools.edit', $tool->id) }}"><i class="fas fa-edit"></i> Edit</a>
                            <button class="btn btn-outline-dark btn-sm"><i class="fas fa-times"></i> Delete</button>
                        </div>
                    </form>
                </td>
            </tr>
            @endforeach
            </tr>
        </tbody>
    </table>
    {{ $tools->appends(\Request::except('page'))->links() }}
    <a href="{{ route('tools.create') }}" class="btn btn-outline-dark"><i class="fas fa-plus"></i> Add</a>
</section>
@endsection
