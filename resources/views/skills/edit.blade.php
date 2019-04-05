@extends('layouts.backend')
@section('content')
<section class="container">
    <form action="{{ route('skills.update', $skill->id) }}" method="POST">
        @csrf @method('PUT')

        <div class="form-group">
            <label for="skill-name">Name</label>
            <input type="text" class="form-control {{ $errors->has('name') ? 'is-invalid' : ($errors->any() ? 'is-valid' : null) }}" id="skill-name" name="name" value="{{ old('name', $skill->name) }}" required>
            @if($errors->has('name'))
            <div class="invalid-feedback">{{ $errors->first('name') }}</div>
            @endif
        </div>
        <div class="form-group">
            <label for="skill-start-date">Start Year</label>
            <input type="number" class="form-control {{ $errors->has('start_date') ? 'is-invalid' : ($errors->any() ? 'is-valid' : null) }}" id="skill-start-date" name="start_date" min="2003" max="{{ date('Y')}}" value="{{ old('start_date', $skill->start_date) }}" value="{{ old('start_date', $skill->start_date) }}" required>
            @if($errors->has('start_date'))
            <div class="invalid-feedback">{{ $errors->first('start_date') }}</div>
            @endif
        </div>
        <div class="form-group">
            <label for="skill-end-date">End Year</label>
            <input type="number" class="form-control {{ $errors->has('end_date') ? 'is-invalid' : ($errors->any() ? 'is-valid' : null) }}" id="skill-end-date" name="end_date" min="2003" max="{{ date('Y')}}" value="{{ old('end_date', $skill->end_date) }}" value="{{ old('end_date', $skill->end_date) }}" required>
            @if($errors->has('end_date'))
            <div class="invalid-feedback">{{ $errors->first('end_date') }}</div>
            @endif
        </div>
        <button class="btn btn-outline-dark"><i class="fas fa-save"></i> Save</button>
    </form>
</section>
@endsection
