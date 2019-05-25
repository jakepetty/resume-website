<section id="projects">
    <header>
        <h2>{{ __('Project Portfolio') }}</h2>
        <p>{{ __("A small collection of projects I've worked on") }}</p>
    </header>
    <div class="container">
        @foreach($projects as $project)
        <div class="row project">
            <div class="col-md-6">
                <img class="img-fluid"
                    src="/img/projects/{{ $project->filename }}"
                    alt="Preview of {{ $project->name }}">
            </div>
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
        </div>
        @endforeach
        <div class="banner">
            <div class="row">
                <div class="col">
                    <div class="middle">
                        <h4>{{ __('Source Code') }}</h4>
                    </div>
                </div>
                <div class="col">
                    <div class="middle">
                        {{ __('I have more projects on my GitHub') }}
                    </div>
                </div>
                <div class="col">
                    <a href="https://github.com/{{ config('app.github.username') }}"
                        class="btn btn-outline-dark btn-lg" target="_blank" rel="noopener noreferrer">
                        {{ __('Visit GitHub') }}</a>
                </div>
            </div>
        </div>
    </div>
</section>
