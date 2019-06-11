<section id="projects">
    <header>
        <h2>{{ __('Project Portfolio') }}</h2>
        <p>{{ __("A small collection of projects I've worked on") }}</p>
    </header>
    <div class="container">
        @foreach($projects as $i => $project)
        <div class="row project" data-aos="flip-up" data-aos-duration="1000">
            @component('components.projects.' . ($i % 2 === 0 ? 'odd' : 'even'), compact('project'))
            @endcomponent
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
