@extends('layouts.frontend')
@section('content')
<header id="intro">
    <div class="bg">
        <div class="container h-100 animated fadeIn slower">
            <div class="row h-100 justify-content-center align-items-center">
                <div class="text-center">
                    <h2 id="name"><strong>{{ config('app.name') }}</strong></h2>
                    <p id="sub-text">{ <strong class="animated" id="skill"></strong> } Developer</p>
                </div>
            </div>
        </div>
    </div>
</header>
<nav id="menu" class="navbar navbar-expand-lg navbar-night navbar-fixed">
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false"
        aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span> Menu
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav mx-auto">
            <li class="nav-item">
                <a class="nav-link" href="#skills"><i class="fas fa-graduation-cap"></i> Skills</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#projects"><i class="fas fa-layer-group"></i> Projects</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#contact"><i class="fas fa-paper-plane"></i> Contact</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="https://github.com/{{ config('app.github.username') }}" target="_blank"><i class="fab fa-github"></i> GitHub</a>
            </li>
        </ul>
    </div>
</nav>

<section id="skills" class="container">
    <div class="heading">
        <h2><span>Pro</span>Skills</h2>
        <p class="lead">I am proficient in the following</p>
    </div>
    <div class="row row-eq-height">
        <div class="col-md-6 col-lg-3 mb-5">
            <div class="card h-100">
                <div class="card-header">
                    <i class="fas fa-code"></i> Languages
                </div>
                <ul class="list-group list-group-flush">
                    @foreach($languages as $language)
                    <li class="list-group-item">{{ $language->name }}</li>
                    @endforeach
                </ul>
            </div>
        </div>
        <div class="col-md-6 col-lg-3 mb-5">
            <div class="card h-100">
                <div class="card-header">
                    <i class="fas fa-project-diagram"></i> Frameworks
                </div>
                <ul class="list-group list-group-flush">
                    @foreach($frameworks as $framework)
                    <li class="list-group-item"><a href="{{ $framework->url }}">{{ $framework->name }}</a></li>
                    @endforeach
                </ul>
            </div>
        </div>
        <div class="col-md-6 col-lg-3 mb-5">
            <div class="card h-100">
                <div class="card-header">
                    <i class="fas fa-laptop-code"></i> Applications
                </div>
                <ul class="list-group list-group-flush">
                    @foreach($applications as $application)
                    <li class="list-group-item"><a href="{{ $application->url }}">{{ $application->name }}</a></li>
                    @endforeach
                </ul>
            </div>
        </div>
        <div class="col-md-6 col-lg-3 mb-5">
            <div class="card h-100">
                <div class="card-header">
                    <i class="fas fa-server"></i> Servers
                </div>
                <ul class="list-group list-group-flush">
                    @foreach($servers as $server)
                    <li class="list-group-item"><a href="{{ $server->url }}">{{ $server->name }}</a></li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
</section>

<section id="projects" class="container">
    <div class="heading">
        <h2><span>Work</span>Portfolio</h2>
        <p class="lead">A small collection of my work over the years</p>
    </div>
    <div class="row">
        @foreach($projects as $project)
        <div class="col-md-6 col-lg-5 col-xl-4 d-flex">
            <div class="card flex-fill">
                <div class="card-img-top" style="background-image: url(images/projects/{{ $project->github_id ? $project->github_id : $project->id }}.jpg)">
                    <div class="hover-link row h-100 justify-content-center align-items-center">
                        <div class="btn-group">
                            @if($project->demo)<a href="{{ $project->demo }}" class="btn btn-blue" target="_blank"><i class="fas fa-eye"></i> Demo</a>@endif
                            <a href="{{ $project->url }}" target="blank" class="btn btn-blue float-right"><i class="fas fa-code"></i> Code</a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <h5 class="card-title">{{ $project->name }}</h5>
                    <p class="card-text">{{ $project->description }}</p>
                </div>
            </div>
        </div>
        @endforeach
    </div>
    <div class=" d-flex justify-content-center align-items-center mt-5">
        <a href="https://github.com/{{ config('app.github.username') }}" class="btn btn-outline-dark btn-lg"><i class="fab fa-github"></i> Visit My GitHub</a>
    </div>
</section>

<section id="contact" class="container">
    <div class="heading">
        <h2><span>Say</span>Hello</h2>
        <p class="lead">Have questions or want to hire me? Send me a message!</p>
    </div>
    <form action="{{ route('contact.send') }}" method="POST">
        @csrf
        <div class="form-row">
            <div class="form-group col-md-6">
                <input type="text" class="form-control {{ $errors->has('name') ? 'is-invalid' : ($errors->any() ? 'is-valid' : null) }}"
                    id="contact-name" name="name" value="{{ old('name') }}" placeholder="Your Name" required>                @if($errors->has('name'))
                <div class="invalid-feedback">{{ $errors->first('name') }}</div>
                @endif
            </div>
            <div class="form-group col-md-6">
                <input type="email" class="form-control {{ $errors->has('email') ? 'is-invalid' : ($errors->any() ? 'is-valid' : null) }}"
                    id="contact-email" name="email" value="{{ old('email') }}" placeholder="Your Email" required>                @if($errors->has('email'))
                <div class="invalid-feedback">{{ $errors->first('email') }}</div>
                @endif
            </div>
        </div>
        <div class="form-group">
            <textarea name="body" class="form-control {{ $errors->has('body') ? 'is-invalid' : ($errors->any() ? 'is-valid' : null) }}"
                id="contact-body" placeholder="Your Message" required>{{ old('body') }}</textarea> @if($errors->has('body'))
            <div class="invalid-feedback">{{ $errors->first('body') }}</div>
            @endif
        </div>
        <button class="btn btn-outline-dark"><i class="fas fa-paper-plane"></i> Send</button>
    </form>
</section>
<footer> &copy; {{date('Y')}} {{env('APP_NAME')}}. All Rights Reserved.</footer>
@endsection
