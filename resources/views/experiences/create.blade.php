@extends('layouts.backend')
@section('content')
<section class="container">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('dashboard.index') }}">{{ __('Dashboard') }}</a></li>
            <li class="breadcrumb-item"><a href="{{ route('experiences.index') }}">{{ __('Experiences') }}</a></li>
            <li class="breadcrumb-item active" aria-current="page">{{ __('New Experience') }}</li>
        </ol>
    </nav>
    <h2>{{ __('Creating a new experience') }}</h2>
    <hr>
    <form action="{{ route('experiences.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="experience-name">{{ __('Company') }}</label>
            <input type="text" class="form-control {{ $errors->has('name') ? 'is-invalid' : ($errors->any() ? 'is-valid' : null) }}" id="experience-name" name="name" value="{{ old('name') }}" placeholder="{{ __('Enter the name of the company you worked at') }}" required>
            @if($errors->has('name'))
            <div class="invalid-feedback">{{ $errors->first('name') }}</div>
            @endif
        </div>
        <div class="form-group">
            <label for="experience-title">{{ __('Title') }}</label>
            <input type="text" class="form-control {{ $errors->has('title') ? 'is-invalid' : ($errors->any() ? 'is-valid' : null) }}" id="experience-title" name="title" value="{{ old('title') }}" placeholder="{{ __('Enter your job title at this company') }}" required>
            @if($errors->has('title'))
            <div class="invalid-feedback">{{ $errors->first('title') }}</div>
            @endif
        </div>
        <div class="form-group">
            <label for="experience-start-date">{{ __('Start Date') }}</label>
            <input type="text" class="form-control {{ $errors->has('start_date') ? 'is-invalid' : ($errors->any() ? 'is-valid' : null) }}" id="experience-start-date" name="start_date" value="{{ old('start_date') }}" placeholder="{{ __('The date you started. Example: 02/2006') }}" required>
            @if($errors->has('start_date'))
            <div class="invalid-feedback">{{ $errors->first('start_date') }}</div>
            @endif
        </div>
        <div class="form-group">
            <label for="experience-end-date">{{ __('End Date') }}</label>
            <input type="text" class="form-control {{ $errors->has('end_date') ? 'is-invalid' : ($errors->any() ? 'is-valid' : null) }}" id="experience-end-date" name="end_date" value="{{ old('end_date') }}" placeholder="{{ __('The date you were let go. Example: 02/2006') }}">
            @if($errors->has('end_date'))
            <div class="invalid-feedback">{{ $errors->first('end_date') }}</div>
            @endif
        </div>
        <div class="form-group">
            <label for="experience-description">{{ __('Job Summary') }}</label>
            <textarea class="form-control {{ $errors->has('description') ? 'is-invalid' : ($errors->any() ? 'is-valid' : null) }}" id="experience-description" name="description" value="{{ old('description') }}" placeholder="{{ __('A brief description of your job at this company') }}" required>{{ old('description') }}</textarea>
            @if($errors->has('description'))
            <div class="invalid-feedback">{{ $errors->first('description') }}</div>
            @endif
        </div>
        <div class="form-group">
            <label for="experience-duties">{{ __('Duties') }}</label>
            <textarea class="form-control {{ $errors->has('duties') ? 'is-invalid' : ($errors->any() ? 'is-valid' : null) }}" id="experience-duties" name="duties" placeholder="{{ __('A detailed list of duties you preformed at this company') }}">{{ old('duties') }}</textarea>
            @if($errors->has('duties'))
            <div class="invalid-feedback">{{ $errors->first('duties') }}</div>
            @endif
        </div>
        <div class="form-group">
            <label for="experience-location">{{ __('Location') }}</label>
            <input type="text" class="form-control {{ $errors->has('location') ? 'is-invalid' : ($errors->any() ? 'is-valid' : null) }}" id="experience-location" name="location" value="{{ old('location') }}" placeholder="Geographical location of the company">
            @if($errors->has('location'))
            <div class="invalid-feedback">{{ $errors->first('location') }}</div>
            @endif
        </div>
        <button class="btn btn-outline-dark"><i class="fas fa-plus"></i> {{ __('Create') }}</button>
    </form>
</section>
@endsection
