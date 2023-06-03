<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>


    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Usando Vite -->
    @vite(['resources/js/app.js'])
</head>

<body>
    <div id="app" class="bg-dark">
        @include('partials.header')
        <div class="mycontainer d-flex container bg-white">
            <div class="sidebar">
                @include('partials.sidebar')
            </div>
            <div class="content container">
                @include('partials.messages')
                @include('partials.errors')
                @yield('content')
            </div>
        </div>
    </div>
</body>

</html>
