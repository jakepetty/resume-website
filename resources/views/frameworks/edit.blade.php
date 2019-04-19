@extends('layouts.backend')
@section('content')
<section class="container">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('dashboard.index') }}">{{ __('Dashboard') }}</a></li>
            <li class="breadcrumb-item"><a href="{{ route('frameworks.index') }}">{{ __('Frameworks') }}</a></li>
            <li class="breadcrumb-item active" aria-current="page">{{ __('Updating a Framework') }}</li>
        </ol>
    </nav>
    <h2>{{ __('Updating') }} {{ $framework->name }}</h2>
    <hr>
    <form action="{{ route('frameworks.update', $framework->id) }}" method="POST">
        @csrf @method('PUT')

        <div class="form-group">
            <label for="framework-name">{{ __('Name') }}</label>
            <input type="text" class="form-control {{ $errors->has('name') ? 'is-invalid' : ($errors->any() ? 'is-valid' : null) }}" id="framework-name" name="name" value="{{ old('name', $framework->name) }}" placeholder="{{ __('Enter the name of the framework') }}" required>
            @if($errors->has('name'))
            <div class="invalid-feedback">{{ $errors->first('name') }}</div>
            @endif
        </div>
        <div class="form-group">
            <label for="framework-url">{{ __('Website') }}</label>
            <input type="url" class="form-control {{ $errors->has('url') ? 'is-invalid' : ($errors->any() ? 'is-valid' : null) }}" id="framework-url" name="url" value="{{ old('url', $framework->url) }}" placeholder="{{ __('Enter the website where you get the framework') }}" required>
            @if($errors->has('url'))
            <div class="invalid-feedback">{{ $errors->first('url') }}</div>
            @endif
        </div>
        <button class="btn btn-outline-dark"><i class="fas fa-save"></i> {{ __('Save') }}</button>
    </form>
</section>
@endsection
