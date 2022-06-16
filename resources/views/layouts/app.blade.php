<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name') }} - @yield('title')</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">

    <!-- Styles -->
    @stack('styles')
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <div class="mx-auto {{ isset($backgroundClass) ? $backgroundClass : 'wcd-background-blue' }}" id="app">
        <div class="wcd-circle-blue-1 relative"></div>
        <div class="wcd-circle-blue-2 relative"></div>
        <div class="wcd-circle-blue-3 relative"></div>

        <div class="z-10 relative">
            @auth
                @if(request()->route()->getName() != 'user.profile')
                    @include('shared.header')
                @endif
            @endauth

            <main class="py-4">
                @yield('content')
            </main>

            @include('shared.navigation')
        </div>
    </div>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="https://unpkg.com/flowbite@1.4.7/dist/flowbite.js"></script>

    @stack('modals')
    @stack('scripts')
</body>
</html>
