@extends('layouts.backend')
@section('content')
<div class="container">
    <form action="{{ route('projects.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="project-image">Image</label>
            <input type="file" class="form-control-file" name="image">
        </div>
        <div class="form-group">
            <label for="project-name">Name</label>
            <input type="text" class="form-control {{ $errors->has('name') ? 'is-invalid' : ($errors->any() ? 'is-valid' : null) }}" id="project-name" name="name" value="{{ old('name') }}" placeholder="Name of the project"  required>
            @if($errors->has('name'))
            <div class="invalid-feedback">{{ $errors->first('name') }}</div>
            @endif
        </div>
        <div class="form-group">
            <label for="project-description">Description</label>
            <textarea class="form-control {{ $errors->has('description') ? 'is-invalid' : ($errors->any() ? 'is-valid' : null) }}" id="project-description" name="description" placeholder="Description of the project"  required>{{ old('description') }}</textarea>
            @if($errors->has('description'))
            <div class="invalid-feedback">{{ $errors->first('description') }}</div>
            @endif
        </div>
        <div class="form-group">
            <label for="project-url">URL</label>
            <input type="url" class="form-control {{ $errors->has('url') ? 'is-invalid' : ($errors->any() ? 'is-valid' : null) }}" id="project-url" name="url" placeholder="(Optional) Source Code URL" value="{{ old('url') }}">
            @if($errors->has('url'))
            <div class="invalid-feedback">{{ $errors->first('url') }}</div>
            @endif
        </div>
        <div class="form-group">
            <label for="project-demo">Demo URL</label>
            <input type="url" class="form-control {{ $errors->has('demo') ? 'is-invalid' : ($errors->any() ? 'is-valid' : null) }}" id="project-demo" name="demo" placeholder="(Optional) Demo URL" value="{{ old('demo') }}">
            @if($errors->has('demo'))
            <div class="invalid-feedback">{{ $errors->first('demo') }}</div>
            @endif
        </div>
        <button class="btn btn-primary">Add</button>
    </form>
</div>
@endsection
