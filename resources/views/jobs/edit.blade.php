@extends('layouts.backend')
@section('content')
<section class="container">
    <h2>Update Experience</h2>
    <form action="{{ route('jobs.update', $job->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="job-name">Company</label>
            <input type="text" class="form-control {{ $errors->has('name') ? 'is-invalid' : ($errors->any() ? 'is-valid' : null) }}" id="job-name" name="name" value="{{ old('name', $job->name) }}" required>
            @if($errors->has('name'))
            <div class="invalid-feedback">{{ $errors->first('name') }}</div>
            @endif
        </div>
        <div class="form-group">
            <label for="job-title">Title</label>
            <input type="text" class="form-control {{ $errors->has('title') ? 'is-invalid' : ($errors->any() ? 'is-valid' : null) }}" id="job-title" name="title" value="{{ old('title', $job->title) }}" required>
            @if($errors->has('title'))
            <div class="invalid-feedback">{{ $errors->first('title') }}</div>
            @endif
        </div>
        <div class="form-group">
            <label for="job-start-date">Start Date</label>
            <input type="text" class="form-control {{ $errors->has('start_date') ? 'is-invalid' : ($errors->any() ? 'is-valid' : null) }}" id="job-start-date" name="start_date" value="{{ old('start_date', $job->start_date) }}" placeholder="Example: 02/2006" required>
            @if($errors->has('start_date'))
            <div class="invalid-feedback">{{ $errors->first('start_date') }}</div>
            @endif
        </div>
        <div class="form-group">
            <label for="job-end-date">End Date</label>
            <input type="text" class="form-control {{ $errors->has('end_date') ? 'is-invalid' : ($errors->any() ? 'is-valid' : null) }}" id="job-end-date" name="end_date" value="{{ old('end_date', $job->end_date) }}" placeholder="Example: 02/2006">
            @if($errors->has('end_date'))
            <div class="invalid-feedback">{{ $errors->first('end_date') }}</div>
            @endif
        </div>
        <div class="form-group">
            <label for="job-description">Description</label>
            <textarea class="form-control {{ $errors->has('description') ? 'is-invalid' : ($errors->any() ? 'is-valid' : null) }}" id="job-description" name="description" value="{{ old('description') }}" required>{{ old('description', $job->description) }}</textarea>
            @if($errors->has('description'))
            <div class="invalid-feedback">{{ $errors->first('description') }}</div>
            @endif
        </div>
        <div class="form-group">
            <label for="job-duties">Duties</label>
            <textarea class="form-control {{ $errors->has('duties') ? 'is-invalid' : ($errors->any() ? 'is-valid' : null) }}" id="job-duties" name="duties">{{ old('duties', $job->duties) }}</textarea>
            @if($errors->has('duties'))
            <div class="invalid-feedback">{{ $errors->first('duties') }}</div>
            @endif
        </div>
        <div class="form-group">
            <label for="job-location">Location</label>
            <input type="text" class="form-control {{ $errors->has('location') ? 'is-invalid' : ($errors->any() ? 'is-valid' : null) }}" id="job-location" name="location" value="{{ old('location', $job->location) }}">
            @if($errors->has('location'))
            <div class="invalid-feedback">{{ $errors->first('location') }}</div>
            @endif
        </div>
        <button class="btn btn-outline-dark"><i class="fas fa-plus"></i> Save</button>
    </form>
</section>
@endsection
