<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg py-16 px-10">
                <h1 class="text-gray-800 dark:text-white text-center text-3xl py-12">Acheivements after completing all the courses</h1>
            @if($completedCourseName)
               @foreach($completedCourseName as $completed)
                <div class="[&_[x-cloak]]:hidden py-4" x-data="{ modalOpen: false }">

                    <a href="#" @click="modalOpen = true" class=" text-white bg-gradient-to-r from-purple-500 via-purple-600 to-purple-700 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-purple-300 dark:focus:ring-purple-800 shadow-lg shadow-purple-500/50 dark:shadow-lg dark:shadow-purple-800/80 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2">View Certificate</a>

                    <span class="text-white">for completing {{$completed}} </span> 
                    <!-- Modal backdrop -->
                    <div
                        class="fixed inset-0 z-[99999] backdrop-blur"
                        x-show="modalOpen"
                        x-transition:enter="transition ease-out duration-200"
                        x-transition:enter-start="opacity-0"
                        x-transition:enter-end="opacity-100"
                        x-transition:leave="transition ease-out duration-100"
                        x-transition:leave-start="opacity-100"
                        x-transition:leave-end="opacity-0" 
                        aria-hidden="true"
                        x-cloak
                    ></div>
                    <!-- End: Modal backdrop -->
                
                    <!-- Modal dialog -->
                    <div
                        id="modal"
                        class="fixed inset-0 z-[99999] flex px-4 md:px-6 py-6"
                        role="dialog"
                        aria-modal="true"
                        x-show="modalOpen"
                        x-transition:enter="transition ease-out duration-300"
                        x-transition:enter-start="opacity-0 scale-75"
                        x-transition:enter-end="opacity-100 scale-100"
                        x-transition:leave="transition ease-out duration-200"
                        x-transition:leave-start="opacity-100 scale-100"
                        x-transition:leave-end="opacity-0 scale-75"
                        x-cloak
                    >
                        <div class="max-w-5xl mx-auto h-full flex items-center">
                            <div class="w-full max-h-full rounded-3xl shadow-2xl aspect-video bg-black" @click.outside="modalOpen = false" @keydown.escape.window="modalOpen = false">
                                <div class="border-8 border-amber-200 border-solid  p-10">
                                    <div class="logo flex justify-center">
                                        <img class="dark:brightness-0 dark:invert" src="{{url('/images/logo.webp')}}" alt="logo"/>
                                    </div>
                        
                                    <div class="text-5xl py-10 text-amber-200 text-center">
                                        Certificate of Completion
                                    </div>
                        
                                    <div class="mb-4 text-center text-black dark:text-white">
                                        This certificate is presented to
                                    </div>
                        
                                    <div class="text-black dark:text-white border-b-orange-50 w-auto text-3xl text-center">
                                        {{Auth::user()->name}}
                                    </div>
                        
                                    <div class="text-black dark:text-white text-center">
                                        {{$completed}}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End: Modal dialog -->
                </div>
                @endforeach
            @endif

            </div>
        </div>
    </div>
</x-app-layout>