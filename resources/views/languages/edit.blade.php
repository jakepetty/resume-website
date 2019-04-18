@extends('layouts.backend')
@section('content')
<section class="container">
    <h2>Updating a language</h2>
    <form action="{{ route('languages.update', $language->id) }}" method="POST">
        @csrf @method('PUT')

        <div class="form-group">
            <label for="language-name">Name</label>
            <input type="text" class="form-control {{ $errors->has('name') ? 'is-invalid' : ($errors->any() ? 'is-valid' : null) }}" id="language-name" name="name" value="{{ old('name', $language->name) }}" required>
            @if($errors->has('name'))
            <div class="invalid-feedback">{{ $errors->first('name') }}</div>
            @endif
        </div>
        <button class="btn btn-outline-dark"><i class="fas fa-save"></i> Save</button>
    </form>
</section>
@endsection
