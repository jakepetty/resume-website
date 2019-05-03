<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name') }} | Full-Stack Web Developer</title>

    <meta name="author" content="{{ config('app.name') }}">
    <meta name="description" content="Full-Stack Web Developer &amp; Mentor">
    <link rel="canonical" href="{{ config('app.url') }}">
    <meta property="og:title" content="{{ config('app.name') }}">
    <meta property="og:locale" content="en_US">
    <meta property="og:type" content="website">
    <meta property="og:description" content="Full-Stack Web Developer &amp; Mentor. I produce elegantly simple things, and I love what I do.">
    <meta property="og:url" content="{{ config('app.url') }}">
    <meta property="og:site_name" content="{{ config('app.name') }}">
    <meta property="og:image" content="{{ config('app.url') }}/img/og_thumbnail.png">
    <meta name="twitter:card" content="summary">
    <meta name="twitter:title" content="{{ config('app.name') }}">
    <meta name="twitter:description" content="Full-Stack Web Developer &amp; Mentor. I produce elegantly simple things, and I love what I do.">
    <meta name="twitter:image" content="{{ config('app.url') }}/img/og_thumbnail.png">
    <meta name="twitter:image:alt" content="{{ config('app.name') }}">

    <link href="{{ mix('css/app.css') }}" rel="stylesheet">
    <link rel="shortcut icon" href="favicon.png" type="image/x-icon">
    <link rel="apple-touch-icon" href="favicon.png">

</head>

<body data-spy="scroll" data-target=".navbar" data-offset="100">
    @yield('content')
    <script src="{{ mix('js/app.js') }}"></script>
    @yield('scripts')
</body>

</html>
