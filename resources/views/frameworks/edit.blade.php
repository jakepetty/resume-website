@extends('layouts.backend')
@section('content')
<section class="container">
    <h2>Updating a framework</h2>
    <form action="{{ route('frameworks.update', $framework->id) }}" method="POST">
        @csrf @method('PUT')

        <div class="form-group">
            <label for="framework-name">Name</label>
            <input type="text" class="form-control {{ $errors->has('name') ? 'is-invalid' : ($errors->any() ? 'is-valid' : null) }}" id="framework-name" name="name" value="{{ old('name', $framework->name) }}" required>
            @if($errors->has('name'))
            <div class="invalid-feedback">{{ $errors->first('name') }}</div>
            @endif
        </div>
        <div class="form-group">
            <label for="framework-url">URL</label>
            <input type="url" class="form-control {{ $errors->has('url') ? 'is-invalid' : ($errors->any() ? 'is-valid' : null) }}" id="framework-url" name="url" value="{{ old('url', $framework->url) }}" required>
            @if($errors->has('url'))
            <div class="invalid-feedback">{{ $errors->first('url') }}</div>
            @endif
        </div>
        <button class="btn btn-outline-dark"><i class="fas fa-save"></i> Save</button>
    </form>
</section>
@endsection
