<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">
    <link rel="stylesheet" href="{{ mix('css/backend.css') }}">
</head>

<body>
    <section id="intro">
        <div class="middle">
            <div id="login">
                <header class="animated flipInX">
                    @yield('content')
                </header>
            </div>
        </div>
    </section>
    <script src="{{ mix('js/app.js') }}"></script>
</body>

</html>
