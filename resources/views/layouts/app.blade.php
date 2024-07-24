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

        {{-- @vite(['tailwind.css','resources/css/app.css', 'resources/js/app.js', ]) --}}

        <!-- Styles -->
        
        <link rel="stylesheet" href="{{ asset('build/assets/app-CmafKZQt.css') }}">
        <link rel="stylesheet" href="{{ asset('build/assets/tailwind.css') }}">
        <link rel="stylesheet" href="{{ asset('build/assets/theme.css') }}">
        @livewireStyles
    </head>
    
    <body class="font-sans antialiased">
        <x-banner />

        <div class="min-h-screen bg-gray-100 dark:bg-gray-900">
            @livewire('navigation-menu')

            <!-- Page Heading -->
            @if (isset($header))
                <header x-data="{ show: window.innerWidth >= 768 }" class="bg-white dark:bg-gray-800 shadow">
                    <div>
                        <button @click="show = !show" :aria-expanded="show ? 'true' : 'false'" :class="{ 'active': show }" class="z-20 shrink-0 grow-0 justify-around  border-t border-gray-200 bg-white/50 p-4 shadow-lg backdrop-blur-lg dark:border-slate-600/60 dark:bg-slate-800/50 fixed -translate-y-2/4 left-6 min-h-[auto] min-w-[64px] flex-col rounded-lg border flex md:hidden" style="bottom: 33%;">
                            <svg viewBox="0 0 24 24" id="magicoon-Filled" xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 fill-white" >
                                <g id="menu-Filled">
                                    <path id="menu-Filled-2" data-name="menu-Filled" class="cls-1" d="M2,5A1,1,0,0,1,3,4H16a1,1,0,0,1,0,2H3A1,1,0,0,1,2,5Zm19,6H3a1,1,0,0,0,0,2H21a1,1,0,0,0,0-2Zm-9,7H3a1,1,0,0,0,0,2h9a1,1,0,0,0,0-2Z"/>
                                </g>
                            </svg>
                        </button>

                        <nav x-show="show" class="flex z-20 shrink-0 grow-0 justify-around @if(auth()->user()->getRoleAttribute() == 'Administrator') gap-3 @elseif(auth()->user()->getRoleAttribute() == 'Student') gap-2 @else gap-7 @endif border-t border-gray-200 bg-white/50 p-4 shadow-lg backdrop-blur-lg dark:border-slate-600/60 dark:bg-slate-800/50 fixed lg:top-1/2 top-1/3 -translate-y-2/4 left-6 min-h-[auto] min-w-[64px] flex-col rounded-lg border">
                        @if(auth()->user()->getRoleAttribute() != 'Parent')
                            <a href="{{ route('learning') }}" class="flex aspect-square min-h-[32px] w-16 flex-col items-center justify-center gap-1 rounded-md p-1.5  {{ Request::is('learning') ? 'text-indigo-600 bg-indigo-50 dark:bg-blue-900 dark:text-sky-50' : 'text-gray-900 dark:text-gray-400' }}  p-3">
                                <!-- HeroIcon - User -->
                            
                                <img class="rounded-t-lg" src="{{url('/images/learning-logo.webp')}}" alt="online-register" />
        
                                <small class="text-center text-xs font-medium"> Learning </small>
                            </a>
                        @endif

                        @if(auth()->user()->getRoleAttribute() == 'Tutor')

                            <a
                                href="{{ route('followers') }}"
                                class="flex aspect-square min-h-[32px] w-16 flex-col items-center justify-center gap-1 rounded-md p-1.5 {{ Request::is('followers') ? 'text-indigo-600 bg-indigo-50 dark:bg-blue-900 dark:text-sky-50' : 'text-gray-900 dark:text-gray-400' }} hover:bg-gray-100  dark:hover:bg-slate-800 p-3"
                            >

                            <img class="rounded-t-lg" src="{{url('/images/users-logo.webp')}}" alt="online-register" />
                                <small class="text-center text-xs font-medium"> Enrollments</small>
                            </a>

                        @endif

                        @if(auth()->user()->getRoleAttribute() == 'Student' || auth()->user()->getRoleAttribute() == 'Parent')
                            <a
                                href="{{ route('acheivements') }}"
                                class="flex aspect-square min-h-[32px] w-16 flex-col items-center justify-center gap-1 rounded-md p-1.5 {{ Request::is('acheivements') ? 'text-indigo-600 bg-indigo-50 dark:bg-blue-900 dark:text-sky-50' : 'text-gray-900 dark:text-gray-400' }} hover:bg-gray-100  dark:hover:bg-slate-800 p-3"
                            >
                            
                                <img class="rounded-t-lg" src="{{url('/images/achievements-logo.webp')}}" alt="online-register" />

        
                                <small class="text-center text-xs font-normal "> Achievements </small>
                            </a>
                        @endif

                        @if(auth()->user()->getRoleAttribute() == 'Student' || auth()->user()->getRoleAttribute() == 'Administrator')

                            <a
                                href="{{ route('program') }}"
                                class="flex aspect-square min-h-[32px] w-16 flex-col items-center justify-center gap-1 rounded-md p-1.5 {{ Request::is('program') ? 'text-indigo-600 bg-indigo-50 dark:bg-blue-900 dark:text-sky-50' : 'text-gray-900 dark:text-gray-400' }} hover:bg-gray-100  dark:hover:bg-slate-800 p-3"
                            >

                            <img class="rounded-t-lg" src="{{url('/images/program-logo.webp')}}" alt="online-register" />

                                <small class="text-center text-xs font-medium"> Program </small>
                            </a>
                            
                            <a
                                href="{{ route('subject') }}"
                                class="flex aspect-square min-h-[32px] w-16 flex-col items-center justify-center gap-1 rounded-md p-1.5 {{ Request::is('subject') ? 'text-indigo-600 bg-indigo-50 dark:bg-blue-900 dark:text-sky-50' : 'text-gray-900 dark:text-gray-400' }} hover:bg-gray-100  dark:hover:bg-slate-800 p-3"
                            >

                            <img class="rounded-t-lg" src="{{url('/images/subject-logo.webp')}}" alt="online-register" />
                                <small class="text-center text-xs font-medium"> Subject </small>
                            </a>

                        @endif

                        @if(auth()->user()->getRoleAttribute() == 'Administrator')

                        <a
                            href="{{ route('material') }}"
                            class="flex aspect-square min-h-[32px] w-16 flex-col items-center justify-center gap-1 rounded-md p-1.5 {{ Request::is('material') ? 'text-indigo-600 bg-indigo-50 dark:bg-blue-900 dark:text-sky-50' : 'text-gray-900 dark:text-gray-400' }} hover:bg-gray-100  dark:hover:bg-slate-800 p-3"
                        >

                        <img class="rounded-t-lg" src="{{url('/images/content-type-logo.webp')}}" alt="online-register" />

                            <small class="text-center text-xs font-medium"> Material </small>
                        </a>

                        <a
                            href="{{ route('category') }}"
                            class="flex aspect-square min-h-[32px] w-16 flex-col items-center justify-center gap-1 rounded-md p-1.5 {{ Request::is('category') ? 'text-indigo-600 bg-indigo-50 dark:bg-blue-900 dark:text-sky-50' : 'text-gray-900 dark:text-gray-400' }} hover:bg-gray-100  dark:hover:bg-slate-800 p-3"
                        >

                        <img class="rounded-t-lg" src="{{url('/images/category-icon.webp')}}" alt="online-register" />

                            <small class="text-center text-xs font-medium"> Category </small>
                        </a>

                        @endif
                        @if(auth()->user()->getRoleAttribute() == 'Administrator' || auth()->user()->getRoleAttribute() == 'Tutor')
                        
                        <a
                            href="{{ route('topic') }}"
                            class="flex aspect-square min-h-[32px] w-16 flex-col items-center justify-center gap-1 rounded-md p-1.5 {{ Request::is('topic') ? 'text-indigo-600 bg-indigo-50 dark:bg-blue-900 dark:text-sky-50' : 'text-gray-900 dark:text-gray-400' }} hover:bg-gray-100  dark:hover:bg-slate-800 p-3"
                        >

                        <img class="rounded-t-lg" src="{{url('/images/topic-logo.webp')}}" alt="online-register" />

                            <small class="text-center text-xs font-medium"> Topics </small>
                        </a>
                        @endif

                        @if(auth()->user()->getRoleAttribute() == 'Administrator')

                        <a
                            href="{{ route('users') }}"
                            class="flex aspect-square min-h-[32px] w-16 flex-col items-center justify-center gap-1 rounded-md p-1.5 {{ Request::is('users') ? 'text-indigo-600 bg-indigo-50 dark:bg-blue-900 dark:text-sky-50' : 'text-gray-900 dark:text-gray-400' }} hover:bg-gray-100  dark:hover:bg-slate-800 p-3"
                        >

                        <img class="rounded-t-lg" src="{{url('/images/users-logo.webp')}}" alt="online-register" />
                            <small class="text-center text-xs font-medium"> Users </small>
                        </a>
                        
                        @endif

                        @if(auth()->user()->getRoleAttribute() != 'Administrator')

                        <hr class="dark:border-gray-700/60" />
                        
                        <a
                            href="/"
                            class="flex h-16 w-16 mt-3 flex-col items-center justify-center gap-1 text-fuchsia-900 dark:text-gray-400"
                        >

                        <img class="rounded-t-lg" src="{{url('/images/homepage-logo.webp')}}" alt="online-register" />
    
                            <small className="text-xs font-medium">Home</small>
                        </a>
                        @endif
                        
                        </nav>
                        
                    </div>
                </header>
            @endif
    
        @if(session('success') || session('failed'))

            <div id="notification" aria-live="assertive" class="pointer-events-none fixed inset-0 flex items-end px-4 py-6 sm:items-start sm:p-6">
                <div class="flex w-full flex-col items-center space-y-4 sm:items-end">
                    <div class="pointer-events-auto w-full max-w-sm overflow-hidden rounded-lg bg-white shadow-lg ring-1 ring-black ring-opacity-5">
                        <div class="p-4">
                        <div class="flex items-start">
                            <div class="flex-shrink-0">
                            @if(session('success'))
                                <svg class="h-6 w-6 text-green-400" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                            @elseif (session('failed'))
                                <svg class="h-6 w-6 fill-red-500" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" id="false-cross-reject-decline" style="enable-background:new 0 0 15 15;" version="1.1" viewBox="0 0 15 15" xml:space="preserve"><path d="M7.5,0C3.364,0,0,3.364,0,7.5S3.364,15,7.5,15S15,11.636,15,7.5S11.636,0,7.5,0z M7.5,14C3.916,14,1,11.084,1,7.5  S3.916,1,7.5,1S14,3.916,14,7.5S11.084,14,7.5,14z"/><polygon points="10.146,4.146 7.5,6.793 4.854,4.146 4.146,4.854 6.793,7.5 4.146,10.146 4.854,10.854 7.5,8.207 10.146,10.854   10.854,10.146 8.207,7.5 10.854,4.854 "/>
                                </svg>
                            @endif
                            
                            </div>
                            <div class="ml-3 w-0 flex-1 pt-0.5">
                            <p class="text-sm font-medium text-gray-900">
                                @if(session('success')) 
                                    {{ session('success') }} 
                                @elseif (session('failed'))
                                    {{ session('failed') }} 
                                @endif
                            </p>
                            </div>
                            <div class="ml-4 flex flex-shrink-0">
                            <button id="closeButton" type="button" class="inline-flex rounded-md bg-white text-gray-400 hover:text-gray-500 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">
                                <span class="sr-only">Close</span>
                                <svg class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                <path d="M6.28 5.22a.75.75 0 00-1.06 1.06L8.94 10l-3.72 3.72a.75.75 0 101.06 1.06L10 11.06l3.72 3.72a.75.75 0 101.06-1.06L11.06 10l3.72-3.72a.75.75 0 00-1.06-1.06L10 8.94 6.28 5.22z" />
                                </svg>
                            </button>
                            </div>
                        </div>
                        </div>
                    </div>
                </div>
            </div>
        @endif

       
          

            <!-- Page Content -->
            <main class="lg:pl-20 lg:ml-12 md:pl-0 sm:pl-0 md:ml-0 sm:ml-0">
                {{ $slot }}
            </main>
        </div>

        @stack('modals')

        <script src="{{ asset('build/assets/theme.js') }}"></script>    

        @livewireScripts
    </body>
</html>
