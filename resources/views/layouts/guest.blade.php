<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <link rel="icon" type="image/svg" href="{{ asset('logo.svg') }}">

        <title>{{ config('app.name', 'SportMeetUp') }}</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

        <script src="https://kit.fontawesome.com/6df54b1a99.js" crossorigin="anonymous"></script>

        <!-- Scripts -->
        <link href="{{ asset('css/app.css') }}" rel="stylesheet" type="text/css" >
        <link href="{{ asset('css/login.css') }}" rel="stylesheet" type="text/css" >
        <script type="text/javascript" src="{{ asset('js/app.js') }}"></script>
    </head>
    <body style="overflow: hidden;">
            {{ $slot }}
    </body>
</html>
