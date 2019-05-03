@extends('layouts.backend')
@section('content')
<section class="container">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('dashboard.index') }}">{{ __('Dashboard') }}</a></li>
            <li class="breadcrumb-item"><a href="{{ route('skills.index') }}">{{ __('Skills') }}</a></li>
            <li class="breadcrumb-item active" aria-current="page">{{ __('Updating a skill') }}</li>
        </ol>
    </nav>
    <h2>{{ __('Updating') }} {{ $skill->name }}</h2>
    <hr>
    <form action="{{ route('skills.update', $skill->id) }}" method="POST">
        @csrf @method('PUT')

        <div class="form-group">
            <label for="skill-name">{{ __('Name') }}</label>
            <input type="text" class="form-control {{ $errors->has('name') ? 'is-invalid' : ($errors->any() ? 'is-valid' : null) }}" id="skill-name" name="name" value="{{ old('name', $skill->name) }}" placeholder="{{ __('Enter the name of the skill') }}" required>
            @if($errors->has('name'))
            <div class="invalid-feedback">{{ $errors->first('name') }}</div>
            @endif
        </div>
        <div class="form-group">
            <label for="skill-years">{{ __('Years of Experience') }}</label>
            <input type="number" class="form-control {{ $errors->has('years') ? 'is-invalid' : ($errors->any() ? 'is-valid' : null) }}" id="skill-years" name="years" value="{{ old('years', $skill->years) }}" placeholder="{{ __('Enter the number of years of experience you have with the skill') }}">
            @if($errors->has('years'))
            <div class="invalid-feedback">{{ $errors->first('years') }}</div>
            @endif
        </div>
        <button class="btn btn-outline-dark"><i class="fas fa-save"></i> {{ __('Save') }}</button>
    </form>
</section>
@endsection
