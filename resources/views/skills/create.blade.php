@extends('layouts.backend')
@section('content')
<section class="container">
    <h2>Create a Skill</h2>
    <form action="{{ route('skills.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="skill-name">Name</label>
            <input type="text" class="form-control {{ $errors->has('name') ? 'is-invalid' : ($errors->any() ? 'is-valid' : null) }}" id="skill-name" name="name" value="{{ old('name') }}" required>
            @if($errors->has('name'))
            <div class="invalid-feedback">{{ $errors->first('name') }}</div>
            @endif
        </div>
        <div class="form-group">
            <label for="skill-start-date">Start Year</label>
            <input type="number" class="form-control {{ $errors->has('start_date') ? 'is-invalid' : ($errors->any() ? 'is-valid' : null) }}" id="skill-start-date" name="start_date" min="1950" max="{{ date('Y')}}" value="{{ old('start_date') }}" required>
            @if($errors->has('start_date'))
            <div class="invalid-feedback">{{ $errors->first('start_date') }}</div>
            @endif
        </div>
        <div class="form-group">
            <label for="skill-end-date">End Year</label>
            <input type="number" class="form-control {{ $errors->has('end_date') ? 'is-invalid' : ($errors->any() ? 'is-valid' : null) }}" id="skill-end-date" name="end_date" min="1950" max="{{ date('Y')}}" value="{{ old('end_date') }}" required>
            @if($errors->has('end_date'))
            <div class="invalid-feedback">{{ $errors->first('end_date') }}</div>
            @endif
        </div>
        <button class="btn btn-outline-dark"><i class="fas fa-plus"></i> Create</button>
    </form>
</section>
@endsection
