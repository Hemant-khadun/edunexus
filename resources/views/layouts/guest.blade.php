<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Edu Nexus') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
        <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.css" rel="stylesheet" />        <!-- Styles -->
        
        <!-- Scripts -->
        
        {{-- @vite(['resources/css/app.css','resources/css/theme.css', 'resources/js/app.js', 'tailwind.css']) --}}
        <link rel="stylesheet" href="{{ asset('build/assets/app-CmafKZQt.css') }}">
        <link rel="stylesheet" href="{{ asset('build/assets/tailwind.css') }}">
        <link rel="stylesheet" href="{{ asset('build/assets/theme.css') }}">
        @livewireStyles
    
        <!-- Scripts -->
        <script src="{{ asset('js/app.js') }}" defer></script>

    </head>
    <body>
        <div class="font-sans text-gray-900 dark:text-gray-100 antialiased">
            {{ $slot }}
        </div>
        {{-- @vite(['resources/js/theme.js']) --}}
        <script src="{{ asset('build/assets/theme.js') }}"></script>    
        @livewireScripts
    </body>
</html>
