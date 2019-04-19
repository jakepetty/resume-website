<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">
</head>

<body>
    <main id="login" class=" h-100">
        <header id="intro">
            <div class="bg">
                <div class="container h-100 row">
                    <div class="col-md-6 offset-md-7">
                        <div class="row h-100 justify-content-center align-items-center">
                            @yield('content')
                        </div>
                    </div>
                </div>
            </div>
        </header>
    </main>
    <script src="{{ mix('js/app.js') }}"></script>
</body>

</html>
