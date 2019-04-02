@extends('layouts.backend')
@section('content')
<div class="container">
    <form action="{{ route('projects.update', $project->id) }}" method="POST" enctype="multipart/form-data">
        @csrf @method('PUT')
        <div class="form-group">
            <label for="project-image">Image</label>
            <input type="file" class="form-control-file" name="image">
        </div>
        <div class="form-group">
            <label for="project-name">Name</label>
            <input type="text" class="form-control {{ $errors->has('name') ? 'is-invalid' : ($errors->any() ? 'is-valid' : null) }}" id="project-name" name="name" value="{{ old('name', $project->name) }}" required>
            @if($errors->has('name'))
            <div class="invalid-feedback">{{ $errors->first('name') }}</div>
            @endif
        </div>
        <div class="form-group">
            <label for="project-description">Description</label>
            <textarea class="form-control {{ $errors->has('description') ? 'is-invalid' : ($errors->any() ? 'is-valid' : null) }}" id="project-description" name="description" required>{{ old('description', $project->description) }}</textarea>
            @if($errors->has('description'))
            <div class="invalid-feedback">{{ $errors->first('description') }}</div>
            @endif
        </div>
        <div class="form-group">
            <label for="project-url">URL</label>
            <input type="text" class="form-control {{ $errors->has('url') ? 'is-invalid' : ($errors->any() ? 'is-valid' : null) }}" id="project-url" name="url" value="{{ old('url', $project->url) }}" required>
            @if($errors->has('url'))
            <div class="invalid-feedback">{{ $errors->first('url') }}</div>
            @endif
        </div>
        <div class="form-group">
            <label for="project-homepage">Homepage</label>
            <input type="text" class="form-control {{ $errors->has('homepage') ? 'is-invalid' : ($errors->any() ? 'is-valid' : null) }}" id="project-homepage" name="homepage" placeholder="(Optional) Demo URL" value="{{ old('homepage', $project->homepage) }}">
            @if($errors->has('homepage'))
            <div class="invalid-feedback">{{ $errors->first('homepage') }}</div>
            @endif
        </div>
        <div class="form-group">
            <label for="project-languages">Languages</label>
            <select class="form-control {{ $errors->has('languages') ? 'is-invalid' : ($errors->any() ? 'is-valid' : null) }}" id="project-languages" name="languages[]" multiple size="{{ $languages->count() }}" required>
                @foreach($languages as $language)
                    <option value="{{ $language->id }}"{{ $project->languages->contains($language->id) ? 'selected': null }}>{{ $language->name }}</option>
                @endforeach
            </select>
            @if($errors->has('languages'))
            <div class="invalid-feedback">{{ $errors->first('languages') }}</div>
            @endif
        </div>
        <button class="btn btn-primary">save</button>
    </form>
</div>
@endsection
