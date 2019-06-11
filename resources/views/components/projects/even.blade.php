<div class="col-md-6">
    <h3>{{ $project->name }}</h3>
    <p>
        {!! $project->description !!}
    </p>
    @if($project->demo)
    <a href="{{ $project->demo }}" class="btn btn-outline-dark" target="_blank" rel="noopener noreferrer"><i class="fas fa-eye"></i>
        {{ __('Visit') }}</a>
    @endif
    @if($project->url)
    <a href="{{ $project->url }}" class="btn btn-outline-dark" target="blank" rel="noopener noreferrer"><i class="fas fa-code"></i>
        {{ __('Source Code') }}</a>
    @endif
</div>
<div class="col-md-6">
    <img class="img-fluid"
        src="/img/projects/{{ $project->filename }}"
        alt="Preview of {{ $project->name }}">
</div>
