@extends('layouts.backend')
@section('content')
<section class="container">
    <h2>Language Management</h2>
    <table class="table table-borderless table-hover">
        <thead class="thead-dark">
            <tr>
                <th>@sortablelink('name', 'language')</th>
                <th class="text-right">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($languages as $language)
            <tr>
                <td>{{ $language->name }}</td>
                <td>
                    <form class="form-inline float-right" action="{{ route('languages.destroy', $language->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this language?')">
                        @csrf @method('DELETE')
                        <div class="btn-group">
                            <a class="btn btn-outline-dark btn-sm" href="{{ route('languages.edit', $language->id) }}"><i class="fas fa-edit"></i> Edit</a>
                            <button class="btn btn-outline-dark btn-sm"><i class="fas fa-times"></i> Delete</button>
                        </div>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    {{ $languages->appends(\Request::except('page'))->links() }}
    <a href="{{ route('languages.create') }}" class="btn btn-outline-dark"><i class="fas fa-plus"></i> Add</a>
</section>
@endsection
