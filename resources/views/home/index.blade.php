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

                        <a href="{{ config('app.github.url') }}" class="fab fa-github animated heartBeat infinite" target="blank"></a
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
        <div class="row equal">
            @foreach($projects as $project)
            <div class="col-lg-6 col-xl-2 d-flex pb-3">
                <div class="card">
                    <div class="card-img-top" style="background-image: url(/images/projects/{{ $project->id }}.jpg)"></div>
                    <!--<img src="/images/icons/{{ $project->language }}.png" class="card-img-top" style="padding:20px 10px" alt="..." />-->
                    <div class="card-body d-flex flex-column">
                        <h5 class="card-title">{{ $project->name }}</h5>
                        <p class="card-text">{{ $project->description }}</p>
                        <div class="d-flex mt-auto justify-content-between">
                            <span class="badge badge-primary justify-content-center align-self-center" style="font-size:inherit">
                                {{ $project->language }}
                            </span>
                            <div class="d-flex">
                                <a href="{{ $project->url }}" target="blank" class="btn btn-outline-dark">View Source</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        <div class="d-flex justify-content-center">
            <a href="{{ config('app.github.url') }}" target="blank" class="btn btn-lg btn-outline-dark view-more">View All Projects</a>
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
