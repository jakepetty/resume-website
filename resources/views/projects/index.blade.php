@extends('layouts.backend')
@section('content')
<section class="container">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('dashboard.index') }}">{{ __('Dashboard') }}</a></li>
            <li class="breadcrumb-item active" aria-current="page">{{ __('Projects') }}</li>
        </ol>
    </nav>
    <div class="btn-group float-right">
        <a href="{{ route('projects.import') }}" class="btn btn-outline-dark"><i class="fab fa-github"></i> {{ __('Import from GitHub') }}</a>
        <a href="{{ route('projects.create') }}" class="btn btn-outline-dark"><i class="fas fa-plus"></i> {{ __('New Project') }}</a>
    </div>
    <h2 class="mb-4">{{ __('Project Management') }}</h2>
    <div class="row ui-sortable" data-url="{{ route('projects.reorder') }}">
        @foreach ($projects as $project)
        <div class="col-md-4 card sortable" data-id="{{ $project->id }}">
            <div style="background-image: url('/images/projects/{{ $project->github_id ? $project->github_id : $project->id }}.jpg')" class="card-img-top"></div>
            <div class="card-body">
                <h5 class="card-title text-center">
                    {{ $project->name }}
                </h5>
                <div class="card-text text-center">
                    <form action="{{ route('projects.destroy', $project->id) }}" method="POST" onsubmit="return confirm('{{ __('Are you sure you want to delete this project?') }}')">
                        <div class="btn-group" role="group">
                            @csrf @method('DELETE')
                            <a class="btn btn-outline-dark btn-sm" href="{{ route('projects.edit', $project->id) }}"><i class="fas fa-edit"></i> {{ __('Edit') }}</a>
                            @if($project->demo)
                            <a class="btn btn-outline-dark btn-sm" href="{{ $project->demo }}" target="_blank"><i class="fas fa-eye"></i> {{ __('Demo') }}</a>
                            @endif
                            <a class="btn btn-outline-dark btn-sm" href="{{ $project->url }}" target="_blank"><i class="fas fa-code"></i> {{ __('Source') }}</a>
                            <button class="btn btn-outline-dark btn-sm"><i class="fas fa-times"></i> {{ __('Delete') }}</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</section>
@endsection
