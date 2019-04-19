@extends('layouts.backend')
@section('content')
<section class="container">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('dashboard.index') }}">{{ __('Dashboard') }}</a></li>
            <li class="breadcrumb-item"><a href="{{ route('servers.index') }}">{{ __('Servers') }}</a></li>
            <li class="breadcrumb-item active" aria-current="page">{{ __('Updating a server') }}</li>
        </ol>
    </nav>
    <h2>{{ __('Updating') }} {{ $server->name }}</h2>
    <hr>
    <form action="{{ route('servers.update', $server->id) }}" method="POST">
        @csrf @method('PUT')

        <div class="form-group">
            <label for="server-name">{{ __('Name') }}</label>
            <input type="text" class="form-control {{ $errors->has('name') ? 'is-invalid' : ($errors->any() ? 'is-valid' : null) }}" id="server-name" name="name" value="{{ old('name', $server->name) }}" placeholder="{{ __('Enter the name of the server software') }}" required>
            @if($errors->has('name'))
            <div class="invalid-feedback">{{ $errors->first('name') }}</div>
            @endif
        </div>
        <div class="form-group">
            <label for="server-url">{{ __('Website') }}</label>
            <input type="url" class="form-control {{ $errors->has('url') ? 'is-invalid' : ($errors->any() ? 'is-valid' : null) }}" id="server-url" name="url" value="{{ old('url', $server->url) }}"  placeholder="{{ __('Enter the website where you get the server software') }}" required>
            @if($errors->has('url'))
            <div class="invalid-feedback">{{ $errors->first('url') }}</div>
            @endif
        </div>
        <button class="btn btn-outline-dark"><i class="fas fa-save"></i> {{ __('Save') }}</button>
    </form>
</section>
@endsection
