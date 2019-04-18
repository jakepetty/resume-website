@extends('layouts.backend')
@section('content')
<section class="container">
    <h2>Add diploma</h2>
    <form action="{{ route('diplomas.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="diploma-name">Institute</label>
            <input type="text" class="form-control {{ $errors->has('name') ? 'is-invalid' : ($errors->any() ? 'is-valid' : null) }}" id="diploma-name" name="name" value="{{ old('name') }}" required>
            @if($errors->has('name'))
            <div class="invalid-feedback">{{ $errors->first('name') }}</div>
            @endif
        </div>
        <div class="form-group">
            <label for="diploma-major">Major</label>
            <input type="text" class="form-control {{ $errors->has('major') ? 'is-invalid' : ($errors->any() ? 'is-valid' : null) }}" id="diploma-major" name="major" value="{{ old('major') }}">
            @if($errors->has('major'))
            <div class="invalid-feedback">{{ $errors->first('major') }}</div>
            @endif
        </div>
        <div class="form-group">
            <label for="diploma-year">Date</label>
            <input type="text" class="form-control {{ $errors->has('year') ? 'is-invalid' : ($errors->any() ? 'is-valid' : null) }}" id="diploma-year" name="year" value="{{ old('year') }}" placeholder="Example: 02/2006">
            @if($errors->has('year'))
            <div class="invalid-feedback">{{ $errors->first('year') }}</div>
            @endif
        </div>
        <div class="form-group">
            <label for="diploma-location">Location</label>
            <input type="text" class="form-control {{ $errors->has('location') ? 'is-invalid' : ($errors->any() ? 'is-valid' : null) }}" id="diploma-location" name="location" value="{{ old('location') }}">
            @if($errors->has('location'))
            <div class="invalid-feedback">{{ $errors->first('location') }}</div>
            @endif
        </div>
        <button class="btn btn-outline-dark"><i class="fas fa-plus"></i> Create</button>
    </form>
</section>
@endsection
