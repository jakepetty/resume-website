<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Administration - {{ config('app.name', 'Laravel') }}</title>

    <link rel="shortcut icon" href="/favicon.png" type="image/x-icon">
    <!-- Styles -->
    <link href="{{ asset('css/backend.css') }}" rel="stylesheet">
</head>

<body>
    <div id="backend">
        <nav class="navbar fixed-top navbar-expand-md navbar-light">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    Résumé <small>Administration</small>
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item">
                            <a class="nav-link" href="/"><i class="fas fa-desktop"></i> {{ __('Frontend') }}</a>
                        </li>
                        <!-- Authentication Links -->
                        @guest
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                        </li>
                        @if (Route::has('register'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                        </li>
                        @endif @else
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true"
                                aria-expanded="false">
                            <i class="fas fa-drafting-compass"></i> Skills
                          </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ route('projects.index') }}"><i class="fas fa-layer-group"></i> {{ __('Projects') }}</a>
                                <a class="dropdown-item" href="{{ route('languages.index') }}"><i class="fas fa-code"></i> {{ __('Languages') }}</a>
                                <a class="dropdown-item" href="{{ route('applications.index') }}"><i class="fas fa-laptop-code"></i> {{ __('Applications') }}</a>
                                <a class="dropdown-item" href="{{ route('frameworks.index') }}"><i class="fas fa-project-diagram"></i> {{ __('Frameworks') }}</a>
                                <a class="dropdown-item" href="{{ route('servers.index') }}"><i class="fas fa-server"></i> {{ __('Servers') }}</a>
                            </div>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true"
                                aria-expanded="false">
                                <i class="fas fa-file-pdf"></i> Resume
                          </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ route('experiences.index') }}"><i class="fas fa-briefcase"></i> {{ __('Experiences') }}</a>
                                <a class="dropdown-item" href="{{ route('diplomas.index') }}"><i class="fas fa-graduation-cap"></i> {{ __('Diplomas') }}</a>
                                <a class="dropdown-item" href="{{ route('cover_letters.index') }}"><i class="fas fa-file-invoice"></i> {{ __('Cover Letters') }}</a>
                            </div>
                        </li>
                        <li class="nav-item">
                            <form id="logout-form" class="form-inline" action="{{ route('logout') }}" method="POST">
                                @csrf
                                <button class="btn btn-outline-dark"><i class="fas fa-sign-out-alt"></i> Logout</button>
                            </form>
                        </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            @yield('content')
        </main>
        <!-- Scripts -->
        <script src="{{ asset('js/app.js') }}" defer></script>
        @yield('scripts')
    </div>
</body>

</html>
