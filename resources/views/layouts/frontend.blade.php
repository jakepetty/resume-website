<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name') }}</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

    <link href="{{ mix('css/app.css') }}" rel="stylesheet">
    <link href="{{ mix('css/animate.min.css') }}" rel="stylesheet">
    <link rel="shortcut icon" href="favicon.png" type="image/x-icon">
</head>

<body class="no-scroll">
    <div id="app">
        @yield('content')
    </div>
    <script src="{{ mix('js/app.js') }}"></script>
    @yield('scripts')
</body>

</html>
