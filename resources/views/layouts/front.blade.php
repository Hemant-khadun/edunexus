<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" >
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Edu Nexus</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
        {{-- <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.css" rel="stylesheet" />        <!-- Styles --> --}}

        {{-- @vite([ 'resources/css/theme.css',]) --}}

        <link rel="stylesheet" href="{{ asset('build/assets/app-CmafKZQt.css') }}">
        <link rel="stylesheet" href="{{ asset('build/assets/tailwind.css') }}">
        <link rel="stylesheet" href="{{ asset('build/assets/theme.css') }}">
        @livewireStyles
    
        <!-- Scripts -->
        <script src="{{ asset('build/assets/app-D3Y-ymQv.js') }}" defer></script>
        

    </head>

    <body class="font-sans antialiased bg-white text-black dark:bg-black  dark:text-white/50">
        
        <div class="min-h-screen bg-gray-50 text-black/50 dark:bg-black dark:text-white/50">
            {{-- <img id="background" class="absolute -left-20 top-0 max-w-[877px]" src="https://laravel.com/assets/img/welcome/background.svg" /> --}}
            <div class="relative w-full">
                
                <x-header>

                </x-header>

                <!-- Page Content -->
                <main>
                    {{ $slot }}
                </main>

                <x-footer>

                </x-footer>
            </div>
        </div>
        {{-- @vite(['resources/js/theme.js', 'node_modules/flowbite/dist/flowbite.min.js']) --}}
        <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.js"></script>    
        <script src="{{ asset('build/assets/theme.js') }}"></script>    
    </body>
</html>
