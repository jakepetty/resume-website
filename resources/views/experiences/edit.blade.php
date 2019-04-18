@extends('layouts.backend')
@section('content')
<section class="container">
    <h2>Update Experience</h2>
    <form action="{{ route('experiences.update', $experience->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="experience-name">Company</label>
            <input type="text" class="form-control {{ $errors->has('name') ? 'is-invalid' : ($errors->any() ? 'is-valid' : null) }}" id="experience-name" name="name" value="{{ old('name', $experience->name) }}" required>
            @if($errors->has('name'))
            <div class="invalid-feedback">{{ $errors->first('name') }}</div>
            @endif
        </div>
        <div class="form-group">
            <label for="experience-title">Title</label>
            <input type="text" class="form-control {{ $errors->has('title') ? 'is-invalid' : ($errors->any() ? 'is-valid' : null) }}" id="experience-title" name="title" value="{{ old('title', $experience->title) }}" required>
            @if($errors->has('title'))
            <div class="invalid-feedback">{{ $errors->first('title') }}</div>
            @endif
        </div>
        <div class="form-group">
            <label for="experience-start-date">Start Date</label>
            <input type="text" class="form-control {{ $errors->has('start_date') ? 'is-invalid' : ($errors->any() ? 'is-valid' : null) }}" id="experience-start-date" name="start_date" value="{{ old('start_date', $experience->start_date) }}" placeholder="Example: 02/2006" required>
            @if($errors->has('start_date'))
            <div class="invalid-feedback">{{ $errors->first('start_date') }}</div>
            @endif
        </div>
        <div class="form-group">
            <label for="experience-end-date">End Date</label>
            <input type="text" class="form-control {{ $errors->has('end_date') ? 'is-invalid' : ($errors->any() ? 'is-valid' : null) }}" id="experience-end-date" name="end_date" value="{{ old('end_date', $experience->end_date) }}" placeholder="Example: 02/2006">
            @if($errors->has('end_date'))
            <div class="invalid-feedback">{{ $errors->first('end_date') }}</div>
            @endif
        </div>
        <div class="form-group">
            <label for="experience-description">Description</label>
            <textarea class="form-control {{ $errors->has('description') ? 'is-invalid' : ($errors->any() ? 'is-valid' : null) }}" id="experience-description" name="description" value="{{ old('description') }}" required>{{ old('description', $experience->description) }}</textarea>
            @if($errors->has('description'))
            <div class="invalid-feedback">{{ $errors->first('description') }}</div>
            @endif
        </div>
        <div class="form-group">
            <label for="experience-duties">Duties</label>
            <textarea class="form-control {{ $errors->has('duties') ? 'is-invalid' : ($errors->any() ? 'is-valid' : null) }}" id="experience-duties" name="duties">{{ old('duties', $experience->duties) }}</textarea>
            @if($errors->has('duties'))
            <div class="invalid-feedback">{{ $errors->first('duties') }}</div>
            @endif
        </div>
        <div class="form-group">
            <label for="experience-location">Location</label>
            <input type="text" class="form-control {{ $errors->has('location') ? 'is-invalid' : ($errors->any() ? 'is-valid' : null) }}" id="experience-location" name="location" value="{{ old('location', $experience->location) }}">
            @if($errors->has('location'))
            <div class="invalid-feedback">{{ $errors->first('location') }}</div>
            @endif
        </div>
        <button class="btn btn-outline-dark"><i class="fas fa-plus"></i> Save</button>
    </form>
</section>
@endsection
