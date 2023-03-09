<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hoja de Vida</title>
    <link rel="stylesheet" href="{{ public_path('assets/css/bootstrap.min.css') }}" type="text/css">
    <style>
        /* Estilos específicos para PDF */
        div {
            border: 0;
            border-width: 0;
        }

        @media print {
            @page {
                margin-top: 10px;
                margin-bottom: 10px;
                margin-left: 10px;
                margin-right: 10px;
                size: letter portrait;
            }
        }
    </style>
</head>
<body>
    <main class="container">
        @include('components.form-contact', ['contacts' => $general['contacts']])
        @include('components.form-profile', ['profiles' => $general['profiles']])
        @include('components.form-experience', ['experiences' => $general['experiences']])
        @include('components.form-education', ['educations' => $general['educations']])
    </main>
</body>
</html>
