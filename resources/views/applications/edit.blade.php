@extends('layouts.backend')
@section('content')
<section class="container">
    <h2>Updating a application</h2>
    <form action="{{ route('applications.update', $application->id) }}" method="POST">
        @csrf @method('PUT')

        <div class="form-group">
            <label for="application-name">Name</label>
            <input type="text" class="form-control {{ $errors->has('name') ? 'is-invalid' : ($errors->any() ? 'is-valid' : null) }}" id="application-name" name="name" value="{{ old('name', $application->name) }}" required>
            @if($errors->has('name'))
            <div class="invalid-feedback">{{ $errors->first('name') }}</div>
            @endif
        </div>
        <div class="form-group">
            <label for="application-url">URL</label>
            <input type="url" class="form-control {{ $errors->has('url') ? 'is-invalid' : ($errors->any() ? 'is-valid' : null) }}" id="application-url" name="url" value="{{ old('url', $application->url) }}" required>
            @if($errors->has('url'))
            <div class="invalid-feedback">{{ $errors->first('url') }}</div>
            @endif
        </div>
        <button class="btn btn-outline-dark"><i class="fas fa-save"></i> Save</button>
    </form>
</section>
@endsection
