<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name') }} - @yield('title')</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="https://unpkg.com/flowbite@1.4.7/dist/flowbite.js" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lato:wght@300;400;700&display=swap" rel="stylesheet">

    <!-- Styles -->
    @stack('styles')
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <div class="mx-auto" id="app">
        @include('shared.header')

        <main class="py-4">
            @yield('content')
        </main>

        @include('shared.navigation')
    </div>

    @stack('modals')
    @stack('scripts')
</body>
</html>
