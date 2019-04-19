@extends('layouts.backend')
@section('content')
<section class="container">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('dashboard.index') }}">{{ __('Dashboard') }}</a></li>
            <li class="breadcrumb-item"><a href="{{ route('languages.index') }}">{{ __('Languages') }}</a></li>
            <li class="breadcrumb-item active" aria-current="page">{{ __('New language') }}</li>
        </ol>
    </nav>
    <h2>{{ __('Adding a new language') }}</h2>
    <hr>
    <form action="{{ route('languages.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="language-name">{{ __('Name') }}</label>
            <input type="text" class="form-control {{ $errors->has('name') ? 'is-invalid' : ($errors->any() ? 'is-valid' : null) }}" id="language-name" name="name" value="{{ old('name') }}" placeholder="{{ __('Enter the name of the programming language') }}" required>
            @if($errors->has('name'))
            <div class="invalid-feedback">{{ $errors->first('name') }}</div>
            @endif
        </div>
        <button class="btn btn-outline-dark"><i class="fas fa-plus"></i> {{ __('Create') }}</button>
    </form>
</section>
@endsection
