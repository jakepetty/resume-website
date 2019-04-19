@extends('layouts.backend')
@section('content')
<section class="container">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('dashboard.index') }}">{{ __('Dashboard') }}</a></li>
            <li class="breadcrumb-item"><a href="{{ route('cover_letters.index') }}">{{ __('Cover Letters') }}</a></li>
            <li class="breadcrumb-item active" aria-current="page">{{ __('New Cover Letter') }}</li>
        </ol>
    </nav>
    <h2>{{ __('Adding a new cover letter') }}</h2>
    <hr>
    <form action="{{ route('cover_letters.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <input type="text" class="form-control {{ $errors->has('name') ? 'is-invalid' : ($errors->any() ? 'is-valid' : null) }}" id="cover-letter-name" name="name" value="{{ old('name') }}" placeholder="{{ __("The name of the company you're applying to") }}" required>
            @if($errors->has('name'))
            <div class="invalid-feedback">{{ $errors->first('name') }}</div>
            @endif
        </div>
        <div class="form-group">
            <textarea class="form-control {{ $errors->has('body') ? 'is-invalid' : ($errors->any() ? 'is-valid' : null) }}" id="cover-letter-body" name="body" required rows="50" placeholder="{{ __('Type your cover letter') }}">{{ old('body') }}</textarea>
            @if($errors->has('body'))
            <div class="invalid-feedback">{{ $errors->first('body') }}</div>
            @endif
        </div>
        <button class="btn btn-outline-dark"><i class="fas fa-save"></i> Save</button>
    </form>
</section>
@endsection
