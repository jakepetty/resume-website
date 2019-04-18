<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name') }}</title>
    <link href="{{ mix('css/app.css') }}" rel="stylesheet">
    <link rel="shortcut icon" href="favicon.png" type="image/x-icon">
</head>

<body data-spy="scroll" data-target=".navbar" data-offset="50">
    <main id="app" class="h-100">
        @yield('content')
    </main>
    <script src="{{ mix('js/app.js') }}"></script>
    @yield('scripts')
</body>

</html>
