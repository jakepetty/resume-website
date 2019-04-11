@extends('layouts.backend')
@section('content')
<section class="container">
    <h2>Cover Letter</h2>
    <form action="{{ route('cover_letters.update', $coverLetter->id) }}" method="POST">
        @csrf @method('PUT')

        <div class="form-group">
            <textarea class="form-control {{ $errors->has('content') ? 'is-invalid' : ($errors->any() ? 'is-valid' : null) }}" id="cover-letter-content" name="content" required rows="50">{{ old('content', $coverLetter->content) }}</textarea>
            @if($errors->has('content'))
            <div class="invalid-feedback">{{ $errors->first('content') }}</div>
            @endif
        </div>
        <button class="btn btn-outline-dark"><i class="fas fa-save"></i> Save</button>
    </form>
</section>
@endsection
