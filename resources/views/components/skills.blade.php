{{-- <section id="skills">
    <div class="container">
        <header>
            <h1>{{ __('Technical Skills') }}</h1>
<p class="lead">{{ __('I am proficient in but not limited to the following') }}</p>
</header>
<div class="row row-eq-height">
    <div class="col-md-6 col-lg-3 mb-5">
        <div class="card h-100">
            <div class="card-header">
                @auth
                <a class="manage" href="{{ route('frameworks.index') }}" data-toggle="tooltip" data-placement="top"
                    title="{{ __('Manage') }}"><i class="fas fa-edit"></i></a>
                @endauth
                <i class="icon fas fa-project-diagram"></i> {{ __('Frameworks') }}
            </div>
            <ul class="list-group">
                @foreach($frameworks as $framework)
                <li class="list-group-item"><a href="{{ $framework->url }}">{{ $framework->name }}</a></li>
                @endforeach
            </ul>
        </div>
    </div>
    <div class="col-md-6 col-lg-3 mb-5">
        <div class="card h-100">
            <div class="card-header">
                @auth
                <a class="manage" href="{{ route('languages.index') }}" data-toggle="tooltip" data-placement="top"
                    title="{{ __('Manage') }}"><i class="fas fa-edit"></i></a>
                @endauth
                <i class="icon fas fa-code"></i> {{ __('Languages') }}
            </div>
            <ul class="list-group">
                @foreach($languages as $language)
                <li class="list-group-item">{{ $language->name }}</li>
                @endforeach
            </ul>
        </div>
    </div>
    <div class="col-md-6 col-lg-3 mb-5">
        <div class="card h-100">
            <div class="card-header">
                @auth
                <a class="manage" href="{{ route('applications.index') }}" data-toggle="tooltip" data-placement="top"
                    title="{{ __('Manage') }}"><i class="fas fa-edit"></i></a>
                @endauth
                <i class="icon fas fa-laptop-code"></i> {{ __('Applications') }}
            </div>
            <ul class="list-group">
                @foreach($applications as $application)
                <li class="list-group-item"><a href="{{ $application->url }}">{{ $application->name }}</a></li>
                @endforeach
            </ul>
        </div>
    </div>
    <div class="col-md-6 col-lg-3 mb-5">
        <div class="card h-100">
            <div class="card-header">
                @auth
                <a class="manage" href="{{ route('servers.index') }}" data-toggle="tooltip" data-placement="top"
                    title="{{ __('Manage') }}"><i class="fas fa-edit"></i></a>
                @endauth
                <i class="icon fas fa-server"></i> Servers
            </div>
            <ul class="list-group">
                @foreach($servers as $server)
                <li class="list-group-item"><a href="{{ $server->url }}">{{ $server->name }}</a></li>
                @endforeach
            </ul>
        </div>
    </div>
</div>
</div>
</section> --}}
<section id="skills">
    <div class="container text-center">
        <header>
            <h2>{{ __('Technical Skills') }}</h2>
            <p>{{ __('I am proficient in but not limited to the following') }}</p>
        </header>
        <div class="middle">
            <div class="wrapper">
                @foreach($skills as $skill)
                <span class="pill" data-aos="zoom-in-up" data-aos-duration="1000">{{ $skill->name }}</span>
                @endforeach
            </div>
        </div>
    </div>
</section>
