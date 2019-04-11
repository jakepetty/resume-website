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
            <input type="number" class="form-control {{ $errors->has('start_date') ? 'is-invalid' : ($errors->any() ? 'is-valid' : null) }}" id="skill-start-date" name="start_date" min="1950" max="{{ date('Y')}}" value="{{ old('start_date', $skill->start_date) }}" required>
            @if($errors->has('start_date'))
            <div class="invalid-feedback">{{ $errors->first('start_date') }}</div>
            @endif
        </div>
        <div class="form-group">
            <label for="skill-end-date">End Year</label>
            <input type="number" class="form-control {{ $errors->has('end_date') ? 'is-invalid' : ($errors->any() ? 'is-valid' : null) }}" id="skill-end-date" name="end_date" min="1950" max="{{ date('Y')}}" value="{{ old('end_date', $skill->end_date) }}" required>
            @if($errors->has('end_date'))
            <div class="invalid-feedback">{{ $errors->first('end_date') }}</div>
            @endif
        </div>
        <div class="form-check mb-3">
            <input type="hidden" name="is_public" value="0">
            <input class="form-check-input {{ $errors->has('is_public') ? 'is-invalid' : ($errors->any() ? 'is-valid' : null) }}" type="checkbox" name="is_public" id="skill-is_public" value="1" {{ old('is_public', $skill->is_public) ? 'checked':null }}>
            <label class="form-check-label" for="skill-is_public">
                Make this skill appear on the homepage
            </label>
            @if($errors->has('is_public'))
            <div class="invalid-feedback">{{ $errors->first('is_public') }}</div>
            @endif
        </div>
        <button class="btn btn-outline-dark"><i class="fas fa-save"></i> Save</button>
    </form>
</section>
@endsection
