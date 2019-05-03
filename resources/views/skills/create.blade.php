@extends('layouts.backend')
@section('content')
<section class="container">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('dashboard.index') }}">{{ __('Dashboard') }}</a></li>
            <li class="breadcrumb-item"><a href="{{ route('skills.index') }}">{{ __('Skills') }}</a></li>
            <li class="breadcrumb-item active" aria-current="page">{{ __('New skill') }}</li>
        </ol>
    </nav>
    <h2>{{ __('Adding a new skill') }}</h2>
    <hr>
    <form action="{{ route('skills.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="skill-name">{{ __('Name') }}</label>
            <input type="text" class="form-control {{ $errors->has('name') ? 'is-invalid' : ($errors->any() ? 'is-valid' : null) }}" id="skill-name" name="name" value="{{ old('name') }}" placeholder="{{ __('Enter the name of the skill') }}" required>
            @if($errors->has('name'))
            <div class="invalid-feedback">{{ $errors->first('name') }}</div>
            @endif
        </div>
        <div class="form-group">
            <label for="skill-years">{{ __('Years of Experience') }}</label>
            <input type="number" class="form-control {{ $errors->has('years') ? 'is-invalid' : ($errors->any() ? 'is-valid' : null) }}" id="skill-years" name="years" value="{{ old('years') }}" placeholder="{{ __('Enter the number of years of experience you have with the skill') }}">
            @if($errors->has('years'))
            <div class="invalid-feedback">{{ $errors->first('years') }}</div>
            @endif
        </div>
        <button class="btn btn-outline-dark"><i class="fas fa-plus"></i> {{ __('Create') }}</button>
    </form>
</section>
@endsection
