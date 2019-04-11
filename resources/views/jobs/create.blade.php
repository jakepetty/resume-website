@extends('layouts.backend')
@section('content')
<section class="container">
    <h2>Add Experience</h2>
    <form action="{{ route('jobs.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="resume_job-name">Company</label>
            <input type="text" class="form-control {{ $errors->has('name') ? 'is-invalid' : ($errors->any() ? 'is-valid' : null) }}" id="resume_job-name" name="name" value="{{ old('name') }}" required>
            @if($errors->has('name'))
            <div class="invalid-feedback">{{ $errors->first('name') }}</div>
            @endif
        </div>
        <div class="form-group">
            <label for="resume_job-title">Title</label>
            <input type="text" class="form-control {{ $errors->has('title') ? 'is-invalid' : ($errors->any() ? 'is-valid' : null) }}" id="resume_job-title" name="title" value="{{ old('title') }}" required>
            @if($errors->has('title'))
            <div class="invalid-feedback">{{ $errors->first('title') }}</div>
            @endif
        </div>
        <div class="form-group">
            <label for="resume_job-start-date">Start Date</label>
            <input type="text" class="form-control {{ $errors->has('start_date') ? 'is-invalid' : ($errors->any() ? 'is-valid' : null) }}" id="resume_job-start-date" name="start_date" value="{{ old('start_date') }}" placeholder="Example: 02/2006" required>
            @if($errors->has('start_date'))
            <div class="invalid-feedback">{{ $errors->first('start_date') }}</div>
            @endif
        </div>
        <div class="form-group">
            <label for="resume_job-end-date">End Date</label>
            <input type="text" class="form-control {{ $errors->has('end_date') ? 'is-invalid' : ($errors->any() ? 'is-valid' : null) }}" id="resume_job-end-date" name="end_date" value="{{ old('end_date') }}" placeholder="Example: 02/2006">
            @if($errors->has('end_date'))
            <div class="invalid-feedback">{{ $errors->first('end_date') }}</div>
            @endif
        </div>
        <div class="form-group">
            <label for="resume_job-description">Description</label>
            <textarea class="form-control {{ $errors->has('description') ? 'is-invalid' : ($errors->any() ? 'is-valid' : null) }}" id="resume_job-description" name="description" value="{{ old('description') }}" required>{{ old('description') }}</textarea>
            @if($errors->has('description'))
            <div class="invalid-feedback">{{ $errors->first('description') }}</div>
            @endif
        </div>
        <div class="form-group">
            <label for="resume_job-duties">Duties</label>
            <textarea class="form-control {{ $errors->has('duties') ? 'is-invalid' : ($errors->any() ? 'is-valid' : null) }}" id="resume_job-duties" name="duties">{{ old('duties') }}</textarea>
            @if($errors->has('duties'))
            <div class="invalid-feedback">{{ $errors->first('duties') }}</div>
            @endif
        </div>
        <div class="form-group">
            <label for="resume_job-location">Location</label>
            <input type="text" class="form-control {{ $errors->has('location') ? 'is-invalid' : ($errors->any() ? 'is-valid' : null) }}" id="resume_job-location" name="location" value="{{ old('location') }}">
            @if($errors->has('location'))
            <div class="invalid-feedback">{{ $errors->first('location') }}</div>
            @endif
        </div>
        <button class="btn btn-outline-dark"><i class="fas fa-plus"></i> Create</button>
    </form>
</section>
@endsection
