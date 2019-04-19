@extends('layouts.backend')
@section('content')
<section class="container">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('dashboard.index') }}">{{ __('Dashboard') }}</a></li>
            <li class="breadcrumb-item"><a href="{{ route('languages.index') }}">{{ __('Languages') }}</a></li>
            <li class="breadcrumb-item active" aria-current="page">{{ __('Updating a language') }}</li>
        </ol>
    </nav>
    <h2>{{ __('Updating') }} {{ $language->name }}</h2>
    <hr>
    <form action="{{ route('languages.update', $language->id) }}" method="POST">
        @csrf @method('PUT')

        <div class="form-group">
            <label for="language-name">{{ __('Name') }}</label>
            <input type="text" class="form-control {{ $errors->has('name') ? 'is-invalid' : ($errors->any() ? 'is-valid' : null) }}" id="language-name" name="name" value="{{ old('name', $language->name) }}" placeholder="{{ __('Enter the name of the programming language') }}" required>
            @if($errors->has('name'))
            <div class="invalid-feedback">{{ $errors->first('name') }}</div>
            @endif
        </div>
        <button class="btn btn-outline-dark"><i class="fas fa-save"></i> {{ __('Save') }}</button>
    </form>
</section>
@endsection
