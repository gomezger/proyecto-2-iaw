<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Tus Materias') }}</title>

    <link rel="icon" href="{{ asset('img/icono.ico') }}">

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="https://kit.fontawesome.com/591d68fa75.js" crossorigin="anonymous"></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/materias.scss') }}" rel="stylesheet">
</head>
<body>
    <div id="app">
        
        @include('componentes.header')

        <main class="py-4">
            @yield('content')
        </main>

        <div class="clearfix"></div>
        
        @include('componentes.footer')

    </div>    

    @yield('scripts')
</body>
</html>
