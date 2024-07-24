<x-guest-layout>
    <x-authentication-card>

        <x-validation-errors class="mb-4 text-center" />

        @session('status')
            <div class="mb-4 font-medium text-sm text-green-600 dark:text-green-400">
                {{ $value }}
            </div>
        @endsession

        <section>
            <div class="flex flex-col items-center justify-center px-6 py-8 mx-auto lg:py-0">
                <x-slot name="logo">
                    <x-authentication-card-logo />
                </x-slot> 
                <div class="w-3/4 bg-white rounded-lg shadow dark:border md:mt-0 lg:max-w-screen-xl sm:max-w-md xl:p-0 dark:bg-gray-800 dark:border-gray-700">
                    <div class="p-6 space-y-4 md:space-y-6 sm:p-8">
                        <h1 class="text-xl font-bold leading-tight tracking-tight text-gray-900 md:text-2xl dark:text-white">
                            Sign in to your account
                        </h1>
                                        
                        <form method="POST" action="{{ route('login') }}" class="space-y-4 md:space-y-6">
                            @csrf

                            <div>
                                <x-label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" value="{{ __('Your email') }}" />
                                <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus autocomplete="username"  class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="name@email.com" required=""/>
                            </div>
                           
                            <div>
                                <x-label for="password" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" value="{{ __('Password') }}" />
                                <x-input id="password" class="block mt-1 w-full" type="password" name="password" required placeholder="••••••••" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" autocomplete="current-password" />
                            </div>

                            <div class="flex items-center justify-between">
                                <div class="flex items-start">
                                    <div class="flex items-center h-5">
                                      <x-checkbox id="remember_me" name="remember" aria-describedby="remember" type="checkbox" class="w-4 h-4 border border-gray-300 rounded bg-gray-50 focus:ring-3 focus:ring-primary-300 dark:bg-gray-700 dark:border-gray-600 dark:focus:ring-primary-600 dark:ring-offset-gray-800 " />
                                    </div>
                                    <div class="ml-3 text-sm">
                                      <label for="remember" class="ms-2 text-sm text-gray-600 dark:text-gray-400">{{ __('Remember me') }}</label>
                                    </div>

                                    <label for="remember_me" class="flex items-center">
                                        
                                    </label>

                                </div>
                                @if (Route::has('password.request'))
                                <a class="text-sm font-medium text-primary-600 hover:underline dark:text-primary-500" href="{{ route('password.request') }}">
                                    {{ __('Forgot your password?') }}
                                </a>
                            @endif
                            </div>

                            <x-button class="w-full text-white bg-primary-600 justify-center hover:bg-primary-700 focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800">
                                {{ __('Log in') }}
                            </x-button>
                            
                            <p class="text-sm font-light text-gray-500 dark:text-gray-400">
                                Don’t have an account yet? <a href="{{ route('register') }}" class="font-medium text-primary-600 hover:underline dark:text-primary-500">Sign up</a>
                            </p>
                        </form>
                    </div>
                </div>
            </div>
          </section>
    </x-authentication-card>
</x-guest-layout>
