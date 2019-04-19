@extends('layouts.backend')
@section('content')
<section class="container">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('dashboard.index') }}">{{ __('Dashboard') }}</a></li>
            <li class="breadcrumb-item active" aria-current="page">{{ __('Cover Letters') }}</li>
        </ol>
    </nav>
    <div class="btn-group float-right">
        <a href="{{ route('cover_letters.create') }}" class="btn btn-outline-dark"><i class="fas fa-plus"></i> {{ __('New Cover Letter') }}</a>
    </div>
    <h2 class="mb-4">{{ __('Cover Letter Management') }}</h2>
    <table class="table table-borderless table-hover">
        <thead class="thead-dark">
            <tr>
                <th>@sortablelink('name', 'Company')</th>
                <th class="text-right">{{ __('Actions') }}</th>
            </tr>
        </thead>
        <tbody>
            @foreach($coverLetters as $coverLetter)
            <tr>
                <td>{{ $coverLetter->name }}</td>
                <td>
                    <form class="form-inline float-right" action="{{ route('cover_letters.destroy', $coverLetter->id) }}" method="POST" onsubmit="return confirm('{{ __('Are you sure you want to delete this cover letter?') }}')">
                        @csrf @method('DELETE')
                        <div class="btn-group">
                            <a class="btn btn-outline-dark btn-sm" href="{{ route('resume.index', $coverLetter->id) }}" target="_blank"><i class="fas fa-eye"></i> {{ __('View Resume') }}</a>
                            <a class="btn btn-outline-dark btn-sm" href="{{ route('cover_letters.edit', $coverLetter->id) }}"><i class="fas fa-edit"></i> {{ __('Edit') }}</a>
                            <button class="btn btn-outline-dark btn-sm"><i class="fas fa-times"></i> {{ __('Delete') }}</button>
                        </div>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    {{ $coverLetters->appends(\Request::except('page'))->links() }}
</section>
@endsection
