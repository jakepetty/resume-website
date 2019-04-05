@extends('layouts.frontend')
@section('content')
<div class="loading"></div>
<header class="container-fluid">
    <div class="row">
        <div id="skills" class="col full-height">
            <div class="row h-100 justify-content-center align-items-center">
                <div class="content text-left">
                    <div class="row">
                        @foreach($skills as $skill)
                        <div class="skill">
                            <div class="name">
                                <span class="fa-stack fa-1x">
                                    <i class="fas fa-circle fa-stack-2x"></i>
                                    <i class="fas fa-check fa-stack-1x fa-inverse"></i>
                                </span> {{ $skill->name }}
                                <span class="badge badge-accent">{{ $skill->end_date - $skill->start_date }} {{ $skill->end_date - $skill->start_date > 1 ? 'years':'year' }}</span>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
            <div class="d-flex justify-content-center scroll-down">
                <a href="#essentials" class="fas fa-chevron-down animated heartBeat infinite"></a>
            </div>
        </div>
        <div class="col full-height order-first order-md-last" id="about">
            <div class="row h-100 justify-content-center align-items-center">
                <div class="content">
                    <div class="title">
                        {{ config('app.name') }}
                    </div>

                    <div class="lead">
                        Full-Stack Developer
                    </div>
                    <div class="links">
                        <a href="https://github.com/{{ config('app.github.username') }}" class="fab fa-github animated heartBeat infinite" target="blank"></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
<section id="projects" class="alt">
    <div class="container-fluid">
        <h2 class="mb-4">Projects</h2>
        <div class="text-center mb-5">Some projects I've created in my free time</div>
        <div class="row">
            @foreach($projects as $project)
            <div class="col-md-6 col-lg-4 col-xl-3 d-flex">
                <div class="card flex-fill">
                    @if($project->homepage)
                    <div class="card-img-top" style="background-image: url(/images/projects/{{ $project->id }}.jpg)">
                        <div class="hover-link row h-100 justify-content-center align-items-center">
                            <a href="{{ $project->homepage }}" class="btn btn-outline-light" target="_blank">Demo</a>
                        </div>
                    </div>
                    @else
                    <div class="card-img-top" style="background-image: url(/images/projects/{{ $project->id }}.jpg)"></div>
                    @endif
                    <div class="card-body">
                        <h5 class="card-title">{{ $project->name }}</h5>
                        <p class="card-text">{{ $project->description }}</p>
                    </div>
                    <div class="card-footer">
                        <a href="#" class="btn btn-outline-dark" style="min-width: 48px" data-trigger="focus" data-toggle="popover" title="Languages" data-html="true" data-content="@foreach($project->languages as $language) <div>{{ $language->name }}</div> @endforeach"><i class="fas fa-info"></i></a>
                        <a href="{{ $project->url }}" target="blank" class="btn btn-outline-dark float-right"><i class="fas fa-code"></i></a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        <div class="d-flex justify-content-center">
            <a href="https://github.com/{{ config('app.github.username') }}?tab=repositories" target="blank" class="btn btn-lg btn-outline-dark view-more">View All Projects</a>
        </div>
    </div>
</section>
<section id="contact">
    <div class="container">
        <h2>Contact Me</h2>
        <form action="{{ route('contact.send') }}" method="POST">
            @csrf
            <div class="form-row">
                <div class="form-group col-md-6">
                    <input type="text" class="form-control" name="name" placeholder="Your Name" value="{{ old('name') }}" required>
                </div>
                <div class="form-group col-md-6">
                    <input type="email" class="form-control" name="email" placeholder="Your Email" value="{{ old('email') }}" required>
                </div>
            </div>
            <div class="form-group">
                <textarea name="body" class="form-control" placeholder="Your Message" required>{{ old('body') }}</textarea>
            </div>
            <button class="btn btn-outline-dark">Send</button> @if($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif
        </form>
    </div>
</section>
<footer>
    <div class="text-center">
        &copy; {{date('Y')}} {{env('APP_NAME')}}. All Rights Reserved.
    </div>
</footer>
@endsection

@section('scripts')
<script src="{{ mix('js/canvas.js') }}"></script>
@endsection
