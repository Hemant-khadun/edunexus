
<x-app-layout>
    <script src="https://cdn.ckeditor.com/ckeditor5/41.4.2/classic/ckeditor.js"></script>

    <x-slot name="header">
    </x-slot>
    
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8" >
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg px-8 pb-8 w-3/4">

                @if (isset($course))
                    <h1 class="text-lg font-semibold mt-4 dark:text-white">Edit Content</h1>
                @else
                    <h1 class="text-lg font-semibold mt-4 dark:text-white">Add New Content</h1>
                @endif                
                <form action="@if(isset($course)){{ route('content.update', $course->id) }}@else{{ route('content.store', request()->route('id')) }}@endif" method="POST" enctype="multipart/form-data">
                    @csrf

                    @if (isset($course))
                        @method('PUT')
                    @endif

                    <input type="hidden" name="wrapper-id" value="@if(request()->route('wid')) {{ request()->route('wid') }} @else {{ request()->route('id') }} @endif">

                    <div class="grid gap-4 sm:grid-cols-2 sm:gap-6 my-4">
                        <div class="sm:col-span-2">
                            <label for="title" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Content Title</label>
                            <input 
                            type="text" 
                            name="title" 
                            id="title" 
                            wire:model.defer="title" 
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                            placeholder="Type Content title"
                            required="" value="@if (isset($course->course_name)) {{$course->course_name}} @endif">
                            @error('title')
                                <div class="alert alert-danger dark:text-red-500">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    @if(isset($course))
                        <livewire:select-topics :grades="$grades" :subjects="$subjects" :course="$course"  />
                    @else
                        <livewire:select-topics :grades="$grades" :subjects="$subjects" />
                    @endif

                    <div class="mb-4">
                        <label for="category" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">{{ __('Category') }}</label>
                        <select id="category" name="category" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required>
                            <option value="0">{{ __('Select category')}}</option>
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}" @if(isset($course) && $course->category_id == $category->id) selected @endif>{{ $category->title }}</option>
                            @endforeach
                        </select>
                        @error('category')
                            <div class="alert alert-danger dark:text-red-500">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="grid gap-4 sm:grid-cols-2 sm:gap-6 my-4">
                        <div class="sm:col-span-2">
                            <label for="description" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Content description</label>
                            <textarea 
                            type="text" 
                            name="description" 
                            id="description" 
                            wire:model.defer="description" 
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                            placeholder="Type Content description"
                            required="" > @if (isset($course->description)) {{$course->description}} @endif </textarea>
                            @error('description')
                                <div class="alert alert-danger dark:text-red-500">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    @if(isset($course))
                        <livewire:course-form :course="$course"/>
                    @else
                        <livewire:course-form/>
                    @endif

                    <div class="flex justify-end mt-3">
                        <a href="@if(request()->route('wid')) {{ route('learning.content',  request()->route('wid')) }} @else {{ route('learning.content',  request()->route('id')) }} @endif">
                            <button type="button" wire:click="cancel" class="px-4 py-2 text-gray-600 hover:text-gray-800 dark:text-white dark:hover:text-gray-500">Cancel</button>
                        </a>
                        <button type="submit" class="text-white bg-gradient-to-r from-blue-500 via-blue-600 to-blue-700 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-blue-300 dark:focus:ring-blue-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2">@if (isset($course)) Edit Content @else Add Content @endif</button>
                    </div>

                </form>
            </div>
        </div>
    </div>
</x-app-layout>

