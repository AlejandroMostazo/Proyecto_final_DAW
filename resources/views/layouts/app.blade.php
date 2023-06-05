<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'SportMeetUp') }}</title>

        <!-- css personales-->
        <link href="{{ asset('css/navigation.css') }}" rel="stylesheet" type="text/css" >
        <link href="{{ asset('css/left-navigation.css') }}" rel="stylesheet" type="text/css" >
        <link href="{{ asset('css/logo.css') }}" rel="stylesheet" type="text/css" >
        <link href="{{ asset('css/publicaciones.css') }}" rel="stylesheet" type="text/css" >

        <!-- Fonts -->
        <!-- <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap"> -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Montserrat+Alternates:wght@500&display=swap" rel="stylesheet">

        <!-- icons bootstrap -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">

        <!-- icons fontawesome  -->
        <script src="https://kit.fontawesome.com/6df54b1a99.js" crossorigin="anonymous"></script>

        <!-- Scripts -->
        <link href="{{ asset('css/app.css') }}" rel="stylesheet" type="text/css" >
        <script type="text/javascript" src="{{ asset('js/app.js') }}"></script>
    </head>
    <body class="font-sans antialiased overflow-hidden" >
        <div class="min-h-screen bg-gray-100 "> <!-- class="bc-sportmeetup" -->
            @include('layouts.navigation')

            @include('layouts.left-navigation')
            <div  class="border-conten">
                <!-- Page Heading -->
                <header class="bg-white shadow">
                   
                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                        {{ $header }}
                    </div>
                </header>
                <!-- Page Content -->
                <main class="overflow-auto">
                    {{ $slot }}
                </main>
            </div>
        </div>
    </body>
</html>
