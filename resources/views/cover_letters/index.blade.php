@extends('layouts.backend')
@section('content')
<section class="container">
    <h2>Cover Letter Management</h2>
    <table class="table table-borderless table-hover">
        <thead class="thead-dark">
            <tr>
                <th>@sortablelink('name', 'Company')</th>
                <th class="text-right">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($coverLetters as $coverLetter)
            <tr>
                <td>{{ $coverLetter->name }}</td>
                <td>
                    <form class="form-inline float-right" action="{{ route('cover_letters.destroy', $coverLetter->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this coverLetter?')">
                        @csrf @method('DELETE')
                        <div class="btn-group">
                                <a class="btn btn-outline-dark btn-sm" href="{{ route('resume.index', $coverLetter->id) }}" target="_blank"><i class="fas fa-eye"></i> View Resume</a>
                                <a class="btn btn-outline-dark btn-sm" href="{{ route('cover_letters.edit', $coverLetter->id) }}"><i class="fas fa-edit"></i> Edit</a>
                            <button class="btn btn-outline-dark btn-sm"><i class="fas fa-times"></i> Delete</button>
                        </div>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    {{ $coverLetters->appends(\Request::except('page'))->links() }}
    <a href="{{ route('cover_letters.create') }}" class="btn btn-outline-dark"><i class="fas fa-plus"></i> Add</a>
</section>
@endsection
