@extends('layouts.backend')
@section('content')
<section class="container">
    <h2>Framework Management</h2>
    <table class="table table-borderless table-hover">
        <thead class="thead-dark">
            <tr>
                <th>@sortablelink('name', 'framework')</th>
                <th class="text-right">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($frameworks as $framework)
            <tr>
                <td>{{ $framework->name }}</td>
                <td>
                    <form class="form-inline float-right" action="{{ route('frameworks.destroy', $framework->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this framework?')">
                        @csrf @method('DELETE')
                        <div class="btn-group">
                            <a class="btn btn-outline-dark btn-sm" href="{{ route('frameworks.edit', $framework->id) }}"><i class="fas fa-edit"></i> Edit</a>
                            <button class="btn btn-outline-dark btn-sm"><i class="fas fa-times"></i> Delete</button>
                        </div>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    {{ $frameworks->appends(\Request::except('page'))->links() }}
    <a href="{{ route('frameworks.create') }}" class="btn btn-outline-dark"><i class="fas fa-plus"></i> Add</a>
</section>
@endsection
