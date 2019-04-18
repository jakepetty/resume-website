@extends('layouts.backend')
@section('content')
<section class="container">
    <h2>Adding a framework</h2>
    <form action="{{ route('frameworks.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="framework-name">Name</label>
            <input type="text" class="form-control {{ $errors->has('name') ? 'is-invalid' : ($errors->any() ? 'is-valid' : null) }}" id="framework-name" name="name" value="{{ old('name') }}" required>
            @if($errors->has('name'))
            <div class="invalid-feedback">{{ $errors->first('name') }}</div>
            @endif
        </div>
        <div class="form-group">
            <label for="framework-url">URL</label>
            <input type="url" class="form-control {{ $errors->has('url') ? 'is-invalid' : ($errors->any() ? 'is-valid' : null) }}" id="framework-url" name="url" value="{{ old('url') }}" required>
            @if($errors->has('url'))
            <div class="invalid-feedback">{{ $errors->first('url') }}</div>
            @endif
        </div>
        <button class="btn btn-outline-dark"><i class="fas fa-plus"></i> Create</button>
    </form>
</section>
@endsection
