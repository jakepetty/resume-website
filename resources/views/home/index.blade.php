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
                            <div class="name">{{ $skill->name }}
                                <span class="experience">{{ $skill->end_date - $skill->start_date }}
                                    {{ $skill->end_date - $skill->start_date > 1 ? 'years':'year' }}
                                </span>
                            </div>
                            <div class="progress">
                                <div class="progress-bar" data-level="{{ $skill->level }}" role="progressbar"></div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
            <div class="d-flex justify-content-center scroll-down">
                <a href="#projects" class="fas fa-chevron-down"></a>
            </div>
        </div>
        <div class="col full-height order-first order-md-last" id="about">
            <div class="row h-100 justify-content-center align-items-center">
                <div class="content">
                    <div class="hexa">
                        <div class="hex">
                            <div class="portrait"></div>
                        </div>
                    </div>
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
<section id="essentials" class="alt">
    <h2>Tool Experience</h2>
    <div class="row">
        <style>
            .progress {
                border-radius:2.5px;
                height:5px;
            }
            .bg-primary {
                border-radius:3px;
                background: #090b10!important
            }
        </style>
        @foreach($tools as $tool)
        <div class="col-4 mb-5">
            <div>{{ $tool->name }}<span class="float-right badge badge-secondary">{{ $tool->end_date - $tool->start_date }} {{ ($tool->end_date - $tool->start_date > 1)? 'years' : 'year' }}</span></div>

            <div class="progress mt-2 mb-2">
                <div class="progress-bar bg-primary" style="width: {{ $tool->level }}%" role="progressbar" aria-valuenow="{{ $tool->level }}" aria-valuemin="0" aria-valuemax="100"></div>
            </div>
        </div>
        @endforeach
    </div>
</section>
<section id="projects">
    <div class="container-fluid">
        <h2 class="mb-4">Projects</h2>
        <div class="text-center mb-5">Some projects I've created in my free time</div>
        <div class="row equal">
            @foreach($projects as $project)
            <div class="col-lg-6 col-xl-2 d-flex pb-3">
                <div class="card">
                    @if($project->homepage)
                    <div class="card-img-top" style="background-image: url(/images/projects/{{ $project->id }}.jpg)">
                        <div class="hover-link row h-100 justify-content-center align-items-center">
                            <a href="{{ $project->homepage }}" class="btn btn-outline-light" target="_blank">Demo</a>
                        </div>
                    </div>
                    @else
                    <div class="card-img-top" style="background-image: url(/images/projects/{{ $project->id }}.jpg)"></div>
                    @endif
                    <div class="card-body d-flex flex-column">
                        <h5 class="card-title">{{ $project->name }}</h5>
                        <p class="card-text">{{ $project->description }}</p>
                        <div class="d-flex mt-auto justify-content-between">
                            <span class="justify-content-center align-self-center" style="font-size:inherit">
                                <button type="button" class="btn btn-outline-dark" data-trigger="focus" data-toggle="popover" title="Languages" data-content="@foreach($project->languages as $language) {{ $language->name }} @endforeach"><i class="fas fa-info"></i></button>


                            </span>
                            <div class="d-flex">
                                <a href="{{ $project->url }}" target="blank" class="btn btn-outline-dark"><i class="fas fa-code"></i></a>
                            </div>
                        </div>
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
<section id="contact" class="alt">
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
