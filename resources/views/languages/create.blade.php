@extends('layouts.backend')
@section('content')
<section class="container">
    <h2>Adding a language</h2>
    <form action="{{ route('languages.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="language-name">Name</label>
            <input type="text" class="form-control {{ $errors->has('name') ? 'is-invalid' : ($errors->any() ? 'is-valid' : null) }}" id="language-name" name="name" value="{{ old('name') }}" required>
            @if($errors->has('name'))
            <div class="invalid-feedback">{{ $errors->first('name') }}</div>
            @endif
        </div>
        <button class="btn btn-outline-dark"><i class="fas fa-plus"></i> Create</button>
    </form>
</section>
@endsection
