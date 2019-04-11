@extends('layouts.backend')
@section('content')
<section class="container">
    <h2>Update Education</h2>
    <form action="{{ route('educations.update', $education->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="education-name">Institute</label>
            <input type="text" class="form-control {{ $errors->has('name') ? 'is-invalid' : ($errors->any() ? 'is-valid' : null) }}" id="education-name" name="name" value="{{ old('name', $education->name) }}" required>
            @if($errors->has('name'))
            <div class="invalid-feedback">{{ $errors->first('name') }}</div>
            @endif
        </div>
        <div class="form-group">
            <label for="education-major">Major</label>
            <input type="text" class="form-control {{ $errors->has('major') ? 'is-invalid' : ($errors->any() ? 'is-valid' : null) }}" id="education-major" name="major" value="{{ old('major', $education->major) }}">
            @if($errors->has('major'))
            <div class="invalid-feedback">{{ $errors->first('major') }}</div>
            @endif
        </div>
        <div class="form-group">
            <label for="education-year">Graduation Date</label>
            <input type="text" class="form-control {{ $errors->has('year') ? 'is-invalid' : ($errors->any() ? 'is-valid' : null) }}" id="education-year" name="year" value="{{ old('year', $education->year) }}" placeholder="Example: 2006">
            @if($errors->has('year'))
            <div class="invalid-feedback">{{ $errors->first('year') }}</div>
            @endif
        </div>
        <div class="form-group">
            <label for="education-location">Location</label>
            <input type="text" class="form-control {{ $errors->has('location') ? 'is-invalid' : ($errors->any() ? 'is-valid' : null) }}" id="education-location" name="location" value="{{ old('location', $education->location) }}">
            @if($errors->has('location'))
            <div class="invalid-feedback">{{ $errors->first('location') }}</div>
            @endif
        </div>
        <button class="btn btn-outline-dark"><i class="fas fa-plus"></i> Save</button>
    </form>
</section>
@endsection
