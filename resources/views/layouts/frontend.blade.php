<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name') }} | Full-Stack Web Developer</title>
    <link rel="manifest" href="/manifest.json">
    <meta name="author" content="{{ config('app.name') }}">
    <meta name="description" content="Full-Stack Web Developer &amp; mentor. I develop simple but complex projects for businesses and consumers and I love every minute of it.">
    <link rel="canonical" href="{{ config('app.url') }}">
    <!-- OPEN GRAPH BEGIN -->
    <meta property="og:title" content="{{ config('app.name') }}">
    <meta property="og:locale" content="en_US">
    <meta property="og:type" content="website">
    <meta property="og:description" content="Full-Stack Web Developer. I develop simple but complex projects for businesses and consumers and I love every minute of it.">
    <meta property="og:url" content="{{ config('app.url') }}">
    <meta property="og:site_name" content="{{ config('app.name') }}">
    <meta property="og:image" content="{{ config('app.url') }}/img/og_thumbnail.png">
    <!-- OPEN GRAPH END -->
    <!-- TWITTER CARD BEGIN -->
    <meta name="twitter:card" content="summary">
    <meta name="twitter:title" content="{{ config('app.name') }}">
    <meta name="twitter:description" content="Full-Stack Web Developer. I develop simple but complex projects for businesses and consumers and I love every minute of it.">
    <meta name="twitter:image" content="{{ config('app.url') }}/img/og_thumbnail.png">
    <meta name="twitter:image:alt" content="{{ config('app.name') }}">
    <!-- TWITTER CARD END -->
    <!-- CSS BEGIN -->
    <link href="{{ mix('css/app.css') }}" rel="stylesheet">
    <!-- CSS END -->
    <!-- ICONS BEGIN -->
    <link rel="shortcut icon" href="favicon.png" type="image/x-icon">
    <link rel="apple-touch-icon" href="favicon.png">
    <!-- ICONS END -->

</head>

<body data-spy="scroll" data-target=".navbar" data-offset="100">
    <!-- CONTENT BEGIN -->
    @yield('content')
    <!-- CONTENT END -->
    <!-- SCRIPTS BEGIN -->
    <script src="{{ mix('js/app.js') }}"></script>
    @yield('scripts')
    <!-- SCRIPTS END -->
</body>

</html>
