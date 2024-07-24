<x-app-layout>
    <x-slot name="header">
    </x-slot>
    
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8" >
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg px-8 pb-8 w-3/4">
                @if (isset($topic))
                    <h1 class="text-lg font-semibold mt-4 dark:text-white">Edit topic</h1>
                @else
                    <h1 class="text-lg font-semibold mt-4 dark:text-white">Add New topic</h1>
                @endif                
                
                <form action="@if (isset($topic))  {{ route('topic.update', $topic->id)}} @else {{ route('topic.store') }} @endif" method="POST" enctype="multipart/form-data">
                    @csrf

                    @if (isset($topic))
                        @method('PUT')
                    @endif

                    <div class="grid gap-4 sm:grid-cols-2 sm:gap-6 my-4">
                        <div class="sm:col-span-2">
                            <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Topic Title</label>
                            <input 
                            type="text" 
                            name="name" 
                            id="name" 
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                            placeholder="Type Topic title"
                            required="" value="@if (isset($topic->name)) {{$topic->name}} @endif">
                            @error('name')
                                <div class="alert alert-danger dark:text-red-500">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    @if(isset($topic))
                        <livewire:dynamic-topcis :grades="$grades" :subjects="$subjects" :courses="$courses" :topic="$topic">
                    @else
                        <livewire:dynamic-topcis :grades="$grades" :subjects="$subjects" :courses="$courses">
                    @endif

                    <div class="flex justify-end">
                        <a href="{{ route('topic') }}">
                            <button type="button" wire:click="cancel" class="px-4 py-2 text-gray-600 hover:text-gray-800 dark:text-white dark:hover:text-gray-500">Cancel</button>
                        </a>
                        <button type="submit" class="text-white bg-gradient-to-r from-blue-500 via-blue-600 to-blue-700 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-blue-300 dark:focus:ring-blue-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2">@if (isset($topic)) Edit topic @else Add topic @endif</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
