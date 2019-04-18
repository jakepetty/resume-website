@extends('layouts.backend')
@section('content')
<section class="container">
    <h2>Creating a Cover Letter</h2>
    <form action="{{ route('cover_letters.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <input type="text" class="form-control {{ $errors->has('name') ? 'is-invalid' : ($errors->any() ? 'is-valid' : null) }}" id="cover-letter-name" name="name" value="{{ old('name') }}" placeholder="Company Name" required>
            @if($errors->has('name'))
            <div class="invalid-feedback">{{ $errors->first('name') }}</div>
            @endif
        </div>
        <div class="form-group">
            <textarea class="form-control {{ $errors->has('body') ? 'is-invalid' : ($errors->any() ? 'is-valid' : null) }}" id="cover-letter-body" name="body" required rows="50" placeholder="Your cover letter">{{ old('body') }}</textarea>
            @if($errors->has('body'))
            <div class="invalid-feedback">{{ $errors->first('body') }}</div>
            @endif
        </div>
        <button class="btn btn-outline-dark"><i class="fas fa-save"></i> Save</button>
    </form>
</section>
@endsection
