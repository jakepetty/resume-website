
<nav id="menu" class="navbar navbar-expand-lg navbar-night navbar-fixed">
    <button class="navbar-toggler collapsed" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav"
        aria-expanded="false" aria-label="Toggle navigation">
        <span class="float-left">
            <span class="icon-bar top-bar"></span>
            <span class="icon-bar middle-bar"></span>
            <span class="icon-bar bottom-bar"></span>
        </span>
        <span class="float-left ml-2">{{ __('Menu') }}</span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav mx-auto">
            <li class="nav-item">
                <a class="nav-link" href="#projects"><i class="fas fa-layer-group"></i> {{ __('Projects') }}</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#skills"><i class="fas fa-graduation-cap"></i> {{ __('Skills') }}</a>
            </li>
            {{-- <li class="nav-item">
                <a class="nav-link" href="#about"><i class="fas fa-user-tie"></i> {{ __('About') }}</a>
            </li> --}}
            <li class="nav-item">
                <a class="nav-link" href="#contact"><i class="fas fa-paper-plane"></i> {{ __('Contact') }}</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="https://github.com/{{ config('app.github.username') }}" target="_blank"><i class="fab fa-github"></i> {{ __('GitHub') }}</a>
            </li>
            @auth
            <li class="nav-item">
                <a class="nav-link" href="{{ route('dashboard.index') }}" target="_blank"><i class="fas fa-tachometer-alt"></i> {{ __('Dashboard') }}</a>
            </li>
            @endauth
        </ul>
    </div>
</nav>
