<x-home-layout>

    <section class="text-center bg-white dark:bg-gray-900 relative py-32 lg:py-36 ">
        <div
            class="mx-auto lg:max-w-7xl w-full px-5 sm:px-10 md:px-12 lg:px-5 flex flex-col lg:flex-row gap-10 lg:gap-12">
            <div class="absolute w-full lg:w-1/2 inset-y-0 lg:right-0 hidden lg:block">
                <span
                    class="absolute -left-6 md:left-4 top-24 lg:top-28 w-24 h-24 rotate-90 skew-x-12 rounded-3xl bg-green-400 blur-xl opacity-60 lg:opacity-95 lg:block hidden"></span>
                <span class="absolute right-4 bottom-12 w-24 h-24 rounded-3xl bg-blue-600 blur-xl opacity-80"></span>
            </div>
            <span
                class="w-4/12 lg:w-2/12 aspect-square bg-gradient-to-tr from-blue-600 to-green-400 absolute -top-5 lg:left-0 rounded-full skew-y-12 blur-2xl opacity-40 skew-x-12 rotate-90"></span>
            <div class="relative flex flex-col items-center text-center lg:text-left lg:py-7 xl:py-8 
                lg:items-start lg:max-w-none max-w-3xl mx-auto lg:mx-0 lg:flex-1 lg:w-1/2">
    
                <h1 class="text-3xl leading-tight sm:text-4xl md:text-5xl xl:text-6xl
                font-bold text-gray-900 dark:text-white">
                Unleash the  
                <span class="text-transparent bg-clip-text bg-gradient-to-br from-indigo-600 from-20% via-blue-600 via-30% to-green-600">Power of Learning!</span>
                </h1>
                <p class="mt-8 text-gray-700 dark:text-gray-500">
                    Discover EduNexus, where learning meets adventure! It’s the one-stop app for kids to organize notes, tackle quizzes, and earn certifications. EduNexus is more than just an app—it’s a community that celebrates every step of your child’s educational journey. Join us and reach for the stars!
                </p>
                <div class="mt-10  w-full flex max-w-md mx-auto lg:mx-0">
                    <div class="flex sm:flex-row flex-col gap-5 w-full">
                        <a href="/login">
                            <button class="flex text-white justify-center items-center w-max min-w-max sm:w-max px-6 h-12 rounded-full outline-none relative overflow-hidden border duration-300 ease-linear
                                    after:absolute after:inset-x-0 after:aspect-square after:scale-0 after:opacity-70 after:origin-center after:duration-300 after:ease-linear after:rounded-full after:top-0 after:left-0 after:bg-[#172554] hover:after:opacity-100 hover:after:scale-[2.5] bg-blue-600 border-transparent hover:border-[#172554]">
                                <span class="hidden sm:flex relative z-[5]">
                                    Get Started
                                </span>
                                <span class="flex sm:hidden relative z-[5]">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M6 12L3.269 3.126A59.768 59.768 0 0121.485 12 59.77 59.77 0 013.27 20.876L5.999 12zm0 0h7.5" />
                                    </svg>
                                </span>
                            </button>
                        </a>
                    </div>
                </div>
            </div>
            <div class="flex flex-1 lg:w-1/2 lg:h-auto relative lg:max-w-none lg:mx-0 mx-auto max-w-3xl">
                <img src="{{url('/images/homepage-hero.webp')}}" alt="Hero image" width="2350" height="2359"
                    class="lg:absolute lg:w-full lg:h-full rounded-3xl object-cover lg:max-h-none max-h-96">
            </div>
        </div>
    </section>

    <section class="py-16 lg:py-10 flex lg:flex-row sm:flex-col justify-around bg-white dark:bg-gray-900 relative">

        <div class="absolute w-full lg:w-1/2 inset-y-0 lg:right-0 hidden lg:block z-0">
            <span class="absolute -left-6 md:left-4 top-24 lg:top-28 w-24 h-24 rotate-90 skew-x-12 rounded-3xl bg-yellow-100 dark:bg-green-100 blur-xl opacity-60 lg:opacity-95 lg:block hidden"></span>
            <span class="absolute right-4 bottom-12 w-24 h-24 rounded-3xl bg-pink-100 blur-xl opacity-80"></span>
        </div>

        <span class="w-4/12 lg:w-2/12 aspect-square bg-gradient-to-tr from-yellow-200 to-red-300 absolute dark:from-white dark:to-red-300 -top-9 lg:left-6 rounded-full skew-y-12 blur-2xl opacity-40 skew-x-12 rotate-90"></span>

        <div class="flex flex-wrap justify-center lg:justify-between w-full lg:w-3/4 gap-3">
            <div class="max-w-sm bg-white border border-gray-200 rounded-lg shadow dark:bg-slate-800 dark:border-gray-700">
                <a href="#" class="flex justify-center pt-5">
                    <img class="rounded-t-lg w-80 max-h-100" src="{{url('/images/parent_teacher.webp')}}" alt="parent-register" />
                </a>
                <div class="p-5">
                    <a href="#">
                        <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">Empower Your Child’s Learning with EduNexus!</h5>
                    </a>
                    <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">Join as a parent and navigate your child’s educational journey with ease. Register with EduNexus to access a comprehensive platform for note organization, engaging quizzes, and celebratory certifications. Be a part of their learning adventure!</p>
                    <a href="{{ route('register', ['t' => 'p'])}}" class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                        Read more
                        <svg class="rtl:rotate-180 w-3.5 h-3.5 ms-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9"/>
                        </svg>
                    </a>
                </div>
            </div>

            <div class="max-w-sm bg-white border border-gray-200 rounded-lg shadow dark:bg-slate-800 dark:border-gray-700 z-10">
                <a href="{{ route('register', ['t' => 't']) }}" class="flex justify-center pt-5">
                    <img class="rounded-t-lg w-80 " src="{{url('/images/online_teacher.webp')}}" alt="online-register" />
                </a>
                <div class="p-5">
                    <a href="{{ route('register', ['t' => 't']) }}">
                        <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">Enhance Your Teaching with EduNexus!</h5>
                    </a>
                    <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">Sign up as a teacher and discover a world of resources at your fingertips. EduNexus provides an innovative space to manage lessons, track student progress, and offer interactive quizzes. Elevate education—register now!</p>
                    <a href="{{ route('register', ['t' => 't']) }}" class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                        Read more
                        <svg class="rtl:rotate-180 w-3.5 h-3.5 ms-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9"/>
                        </svg>
                    </a>
                </div>
            </div>
        </div>

    </section>


    <section id="games" class="px-5 sm:px-10 md:px-12 lg:px-5 flex flex-col sm:flex-col justify-center bg-white dark:bg-gray-900 relative">
        <div class="lg:max-w-7xl w-full justify-center flex flex-col">
            <h2 class="text-center lg:py-16 py-10 text-4xl font-extrabold leading-none tracking-tight text-gray-900 md:text-5xl lg:text-6xl dark:text-white">The Learning Games: Magic Adventures!</h2>
            <div class="flex justify-center">
                <p class="w-3/4 text-center mb-3 font-normal text-gray-700 dark:text-gray-400">Welcome to the enchanted world of learning! Join our magical characters—Wizzy the Wise Owl, Bella the Bookworm, and Leo the Curious Lion—as they explore ancient libraries, solve riddles, and uncover hidden knowledge.</p>
            </div>

            <div class="flex justify-center">
                <div class="p-24 flex flex-wrap items-center justify-around w-full gap-3">
                    <a href="{{ route('geometry.pals')}}">
                        <div class="flex-shrink-0 m-6 relative overflow-hidden bg-yellow-200 rounded-lg max-w-xs shadow-lg w-full p-0 sm:p-3">
                        <svg class="absolute bottom-0 left-0 mb-8" viewBox="0 0 375 283" fill="none" style="transform: scale(1.5); opacity: 0.1;">
                            <rect x="159.52" y="175" width="152" height="152" rx="8" transform="rotate(-45 159.52 175)" fill="black"/>
                            <rect y="107.48" width="152" height="152" rx="8" transform="rotate(-45 0 107.48)" fill="black"/>
                        </svg>
                        <div class="relative pt-10 px-10 flex items-center justify-center">
                            <div class="block absolute w-48 h-48 bottom-0 left-0 -mb-24 ml-3" style="background: radial-gradient(black, transparent 60%); transform: rotate3d(0, 0, 1, 20deg) scale3d(1, 0.6, 1); opacity: 0.2;"></div>
                            <img class="relative w-40" src="{{url('/images/shaping-logo.png')}}" alt="">
                        </div>
                        <div class="relative text-white px-6 pb-6 mt-6">
                            <span class="block opacity-75 text-black -mb-1">Game</span>
                            <div class="flex justify-between">
                            <span class="block font-semibold text-xl text-orange-500">Geometry pals</span>
                            <span class="h-full ml-3 bg-white rounded-full text-orange-500 text-xs font-bold px-3 py-2 leading-none flex items-center">Play</span>
                            </div>
                        </div>
                        </div>
                    </a>
                    <a href="{{ route('formula.numbers')}}">
                        <div class="flex-shrink-0 m-6 relative overflow-hidden bg-teal-500 rounded-lg max-w-xs shadow-lg w-full">
                            <svg class="absolute bottom-0 left-0 mb-8" viewBox="0 0 375 283" fill="none" style="transform: scale(1.5); opacity: 0.1;">
                                <rect x="159.52" y="175" width="152" height="152" rx="8" transform="rotate(-45 159.52 175)" fill="white"/>
                                <rect y="107.48" width="152" height="152" rx="8" transform="rotate(-45 0 107.48)" fill="white"/>
                            </svg>
                            <div class="relative pt-10 px-10 flex items-center justify-center">
                                <div class="block absolute w-48 h-48 bottom-0 left-0 -mb-24 ml-3" style="background: radial-gradient(black, transparent 60%); transform: rotate3d(0, 0, 1, 20deg) scale3d(1, 0.6, 1); opacity: 0.2;"></div>
                                <img class="relative w-40" src="{{url('/images/formula-numbers-logo.webp')}}" alt="">
                            </div>
                            <div class="relative text-white px-6 pb-6 mt-6">
                                <span class="block opacity-75 -mb-1">Game</span>
                                <div class="flex justify-between">
                                <span class="block font-semibold text-xl">Formula Numbers</span>
                                <span class="h-full ml-3 block bg-white rounded-full text-xs font-bold px-3 py-2 leading-none items-center text-teal-600">Play</span>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
        </div?>
    </section>

</x-home-layout>
