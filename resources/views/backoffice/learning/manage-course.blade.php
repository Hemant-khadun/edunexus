<x-app-layout>
    <x-slot name="header">
    </x-slot>
    
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8" >
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg px-8 pb-8 w-3/4">
                @if (isset($course))
                    <h1 class="text-lg font-semibold mt-4 dark:text-white">Edit Course</h1>
                @else
                    <h1 class="text-lg font-semibold mt-4 dark:text-white">Add New Course</h1>
                @endif                
                
                <form action="@if (isset($course))  {{ route('course.update', $course->id)}} @else {{ route('course.store') }} @endif" method="POST" enctype="multipart/form-data">
                    @csrf

                    @if (isset($course))
                        @method('PUT')
                    @endif

                    <div class="grid gap-4 sm:grid-cols-2 sm:gap-6 my-4">
                        <div class="sm:col-span-2">
                            <label for="title" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Course Title</label>
                            <input 
                            type="text" 
                            name="title" 
                            id="title" 
                            wire:model.defer="title" 
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                            placeholder="Type Course title"
                            required="" value="@if (isset($course->title)) {{$course->title}} @endif">
                            @error('title')
                                <div class="alert alert-danger dark:text-red-500">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="sm:col-span-2">
                        <label for="description" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Course Description</label>
                        <textarea 
                        type="textarea" 
                        name="description" 
                        id="description" 
                        wire:model.defer="description" 
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                        placeholder="Type subject description"
                        >@if (isset($course->description)) {{$course->description}} @endif</textarea>
                        @error('description')
                            <div class="alert alert-danger dark:text-red-500">{{ $message }}</div>
                        @enderror
                    </div>


                    <div class="flex justify-end mt-3">
                        <a href="{{ route('learning') }}">
                            <button type="button" wire:click="cancel" class="px-4 py-2 text-gray-600 hover:text-gray-800 dark:text-white dark:hover:text-gray-500">Cancel</button>
                        </a>
                        <button type="submit" class="text-white bg-gradient-to-r from-blue-500 via-blue-600 to-blue-700 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-blue-300 dark:focus:ring-blue-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2">@if (isset($course)) Edit Course @else Add Course @endif</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
