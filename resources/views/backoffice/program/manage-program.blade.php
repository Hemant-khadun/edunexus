<x-app-layout>
    <x-slot name="header">
    </x-slot>
    
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8" >
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg px-8 pb-8 w-3/4">
                @if (isset($program))
                    <h1 class="text-lg font-semibold mt-4 dark:text-white">Edit Program</h1>
                @else
                    <h1 class="text-lg font-semibold mt-4 dark:text-white">Add New Program</h1>
                @endif                
                
                <form action="@if (isset($program))  {{ route('program.update', $program->id)}} @else {{ route('program.store') }} @endif" method="POST" enctype="multipart/form-data">
                    @csrf

                    @if (isset($program))
                        @method('PUT')
                    @endif

                    <div class="grid gap-4 sm:grid-cols-2 sm:gap-6 my-4">
                        <div class="sm:col-span-2">
                            <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Grade Title</label>
                            <input 
                            type="text" 
                            name="name" 
                            id="name" 
                            wire:model.defer="title" 
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                            placeholder="Type grade title"
                            required="" value="@if (isset($program->title)) {{$program->title}} @endif">
                            @error('name')
                                <div class="alert alert-danger dark:text-red-500">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="mb-4">

                        <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" for="file_input">Upload file</label>
                        <input 
                        class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400" 
                        aria-describedby="file_input_help"
                        id="thumbnail" 
                        wire:model.defer="thumbnail" 
                        accept="image/*" 
                        type="file"
                        name="thumbnail"
                        >
                        <p class="mt-1 mb-1 text-sm text-gray-500 dark:text-gray-300" id="file_input_help">SVG, PNG, JPG or GIF (MAX. 400x400px).</p>
                        
                        @if (isset($program->thumbnail) && $program->thumbnail)

                        <span class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Uploaded file:</span>

                            @if ($program->media->isNotEmpty())
                                <img src="{{ $program->media->first()->getUrl() }}" alt="@if (isset($program->title)) {{ $program->title }} @endif" class="w-16 h-16 rounded-full">
                            @else
                                <span>No thumbnail available</span>
                            @endif

                        @endif

                        @error('thumbnail')
                            <div class="alert alert-danger dark:text-red-500">{{ $message }}</div>
                        @enderror

                    </div>

                    <div class="flex justify-end">
                        <a href="{{ route('program') }}">
                            <button type="button" wire:click="cancel" class="px-4 py-2 text-gray-600 hover:text-gray-800 dark:text-white dark:hover:text-gray-500">Cancel</button>
                        </a>
                        <button type="submit" class="text-white bg-gradient-to-r from-blue-500 via-blue-600 to-blue-700 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-blue-300 dark:focus:ring-blue-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2">@if (isset($program)) Edit Program @else Add Program @endif</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
