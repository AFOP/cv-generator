<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hoja de Vida Andrés Ocaña</title>
    <link rel="stylesheet" href="{{ url('/assets/css/bootstrap.min.css') }}">
    <style>
        ul.no-bullet {
            list-style-type: none;
            margin: 0;
            padding: 0;
        }
    </style>
</head>
<body>
    @include('components.navbar')
    
    <main class="container">
        @yield('content')
    </main>

    <script src="{{ url('/assets/js/bootstrap.bundle.min.js') }}"></script>
</body>
</html>