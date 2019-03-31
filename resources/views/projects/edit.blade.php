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
            <input type="text" class="form-control" id="project-name" name="name" value="{{ old('name', $project->name) }}">
        </div>
        <div class="form-group">
            <label for="project-description">Description</label>
            <textarea class="form-control" id="project-description" name="description">{{ old('description', $project->description) }}</textarea>
        </div>
        <div class="form-group">
            <label for="project-url">URL</label>
            <input type="text" class="form-control" id="project-url" name="url" value="{{ old('url', $project->url) }}">
        </div>
        <div class="form-group">
            <label for="project-language">Language</label>
            <input type="text" class="form-control" id="project-language" name="language" value="{{ old('language', $project->language) }}">
        </div>
        <button class="btn btn-primary">save</button>
    </form>
</div>
@endsection
