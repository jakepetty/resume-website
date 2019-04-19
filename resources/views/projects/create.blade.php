@extends('layouts.backend')
@section('content')
<section class="container">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('dashboard.index') }}">{{ __('Dashboard') }}</a></li>
            <li class="breadcrumb-item"><a href="{{ route('projects.index') }}">{{ __('Projects') }}</a></li>
            <li class="breadcrumb-item active" aria-current="page">{{ __('New Project') }}</li>
        </ol>
    </nav>
    <h2>{{ __('Adding a new project') }}</h2>
    <hr>
    <form action="{{ route('projects.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="project-image">{{ __('Image') }}</label>
            <input type="file" class="form-control-file" name="image">
        </div>
        <div class="form-group">
            <label for="project-name">{{ __('Name') }}</label>
            <input type="text" class="form-control {{ $errors->has('name') ? 'is-invalid' : ($errors->any() ? 'is-valid' : null) }}" id="project-name" name="name" value="{{ old('name') }}" placeholder="{{ __('Name of the project') }}"  required>
            @if($errors->has('name'))
            <div class="invalid-feedback">{{ $errors->first('name') }}</div>
            @endif
        </div>
        <div class="form-group">
            <label for="project-description">{{ __('Description') }}</label>
            <textarea class="form-control {{ $errors->has('description') ? 'is-invalid' : ($errors->any() ? 'is-valid' : null) }}" id="project-description" name="description" placeholder="{{ __('Description of the project') }}"  required>{{ old('description') }}</textarea>
            @if($errors->has('description'))
            <div class="invalid-feedback">{{ $errors->first('description') }}</div>
            @endif
        </div>
        <div class="form-group">
            <label for="project-url">{{ __('Source Code URL') }}</label>
            <input type="url" class="form-control {{ $errors->has('url') ? 'is-invalid' : ($errors->any() ? 'is-valid' : null) }}" id="project-url" name="url" placeholder="{{ __('(Optional) Source Code URL') }}" value="{{ old('url') }}">
            @if($errors->has('url'))
            <div class="invalid-feedback">{{ $errors->first('url') }}</div>
            @endif
        </div>
        <div class="form-group">
            <label for="project-demo">{{ __('Demo URL') }}</label>
            <input type="url" class="form-control {{ $errors->has('demo') ? 'is-invalid' : ($errors->any() ? 'is-valid' : null) }}" id="project-demo" name="demo" placeholder="{{ __('(Optional) Demo URL') }}" value="{{ old('demo') }}">
            @if($errors->has('demo'))
            <div class="invalid-feedback">{{ $errors->first('demo') }}</div>
            @endif
        </div>
        <button class="btn btn-outline-dark"><i class="fas fa-plus"></i> {{ __('Create') }}</button>
    </form>
</section>
@endsection
