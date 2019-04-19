@extends('layouts.backend')
@section('content')
<section class="container">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('dashboard.index') }}">{{ __('Dashboard') }}</a></li>
            <li class="breadcrumb-item active" aria-current="page">{{ __('Languages') }}</li>
        </ol>
    </nav>
    <div class="btn-group float-right">
        <a href="{{ route('languages.create') }}" class="btn btn-outline-dark"><i class="fas fa-plus"></i> {{ __('New Language') }}</a>
    </div>
    <h2 class="mb-4">{{ __('Language Management') }}</h2>
    <table class="table table-borderless table-hover ui-sortable" data-url="{{ route('languages.reorder') }}">
        <thead class="thead-dark">
            <tr>
                <th>{{ __('Language') }}</th>
                <th class="text-right">{{ __('Actions') }}</th>
            </tr>
        </thead>
        <tbody>
            @foreach($languages as $language)
            <tr class="sortable" data-id="{{ $language->id }}">
                <td>{{ $language->name }}</td>
                <td>
                    <form class="form-inline float-right" action="{{ route('languages.destroy', $language->id) }}" method="POST" onsubmit="return confirm('{{ __('Are you sure you want to delete this language?') }}')">
                        @csrf @method('DELETE')
                        <div class="btn-group">
                            <a class="btn btn-outline-dark btn-sm" href="{{ route('languages.edit', $language->id) }}"><i class="fas fa-edit"></i> {{ __('Edit') }}</a>
                            <button class="btn btn-outline-dark btn-sm"><i class="fas fa-times"></i> {{ __('Delete') }}</button>
                        </div>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</section>
@endsection
