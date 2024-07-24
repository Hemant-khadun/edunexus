<div>
    <div class="mb-4">
        <label for="material" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">{{ __('Material') }}</label>
        <select wire:model.live="selectedMaterial" id="material" name="material" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required>
            <option value="0">{{ __('Select Material Type')}}</option>
            @foreach ($materials as $material)
                <option value="{{ $material->title }}" @if(isset($course) && $course->material_id == $material->id) selected @endif>{{ $material->title }}</option>
            @endforeach
        </select>
        @error('material')
            <div class="alert alert-danger dark:text-red-500">{{ $message }}</div>
        @enderror
    </div>

    <!-- Video upload field -->
    @if ($selectedMaterial === 'Video')
        <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" for="file_input">Upload video</label>
        <input class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400" id="file_input" type="file" name="video" accept=".mp4,.mov">
    @if(isset($course))
        @if ($course->media->isNotEmpty())
       
        <div class="flex justify-center pt-6">

            <!-- Modal video component -->
            <div class="[&_[x-cloak]]:hidden" x-data="{ modalOpen: false }">
        
                <!-- Video thumbnail -->
                <a href="#" class="relative flex justify-center items-center focus:outline-none focus-visible:ring focus-visible:ring-indigo-300 rounded-3xl group" @click="modalOpen = true" aria-controls="modal" aria-label="Watch the video">
                    <img class="rounded-3xl shadow-2xl transition-shadow duration-300 ease-in-out" src="https://cruip-tutorials.vercel.app/modal-video/modal-video-thumb.jpg" width="768" height="432" alt="Modal video thumbnail" />
                    <!-- Play icon -->
                    <svg class="absolute pointer-events-none group-hover:scale-110 transition-transform duration-300 ease-in-out" xmlns="http://www.w3.org/2000/svg" width="72" height="72">
                        <circle class="fill-white" cx="36" cy="36" r="36" fill-opacity=".8" />
                        <path class="fill-indigo-500 drop-shadow-2xl" d="M44 36a.999.999 0 0 0-.427-.82l-10-7A1 1 0 0 0 32 29V43a.999.999 0 0 0 1.573.82l10-7A.995.995 0 0 0 44 36V36c0 .001 0 .001 0 0Z" />
                    </svg>
                </a>
                <!-- End: Video thumbnail -->
            
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
                        <div class="w-full max-h-full rounded-3xl shadow-2xl aspect-video bg-black overflow-hidden" @click.outside="modalOpen = false" @keydown.escape.window="modalOpen = false">
                            <video x-init="$watch('modalOpen', value => value ? $el.play() : $el.pause())" width="920" height="720" loop controls>
                                <source src="{{ $course->media->first()->getUrl() }}" type="video/mp4" />
                                Your browser does not support the video tag.
                            </video>
                        </div>
                    </div>
                </div>
                <!-- End: Modal dialog -->
            
            </div>
            <!-- End: Modal video component -->
        @endif
    @endif
    @endif
    @error('video')
        <div class="alert alert-danger dark:text-red-500">{{ $message }}</div>
    @enderror
    
    <!-- File upload field -->
    @if ($selectedMaterial === 'File')
        <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" for="file_input">Upload Document File</label>
        <input class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400" id="file_input" type="file" name="file" accept="application/msword, application/vnd.ms-excel, application/vnd.ms-powerpoint, text/plain, application/pdf, image/*">
        @if(isset($course))
            @if ($course->media->isNotEmpty())
                <a href="{{ $course->media->first()->getUrl() }}"
                class="flex mt-2 select-none items-center gap-2 rounded-lg py-2 px-4 text-center align-middle font-sans text-xs font-bold uppercase text-blue-300 transition-all hover:bg-blue-500/10 active:bg-blue-500/30 disabled:pointer-events-none disabled:opacity-50 disabled:shadow-none"
                data-ripple-dark="true"
                target="_blank"
                >
                    View file
                    <svg
                    xmlns="http://www.w3.org/2000/svg"
                    fill="none"
                    viewBox="0 0 24 24"
                    stroke-width="2"
                    stroke="currentColor"
                    aria-hidden="true"
                    class="h-4 w-4"
                    >
                    <path
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        d="M17.25 8.25L21 12m0 0l-3.75 3.75M21 12H3"
                    ></path>
                    </svg>
                </a>
            @endif
        @endif
        
    @endif
    @error('file')
        <div class="alert alert-danger dark:text-red-500">{{ $message }}</div>
    @enderror
    
    <!-- Quiz questions input -->
    @if ($selectedMaterial === 'Quiz')
        <livewire:quiz-generator :course="$course" />
    @endif
    @error('quiz_questions.*')
        <div class="alert alert-danger dark:text-red-500">{{ __('The Quiz Question field is required.') }}</div>
    @enderror
    
    <!-- Text questions input -->
    @if ($selectedMaterial === 'Text')
        <div class="mb-4">

            <div class="sm:col-span-2">
                <label for="course_text" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Course Description</label>
                <textarea 
                type="textarea" 
                name="course_text" 
                id="course_text" 
                wire:model.defer="course_text" 
                x-init="
                        ClassicEditor
                        .create( document.querySelector( '#course_text' ), {
                            toolbar: [ 
                                'undo', 'redo', '|', 'heading', 'bold', 'italic', 'link', '|',
                                'bulletedList', 'numberedList', '|',
                                'blockQuote', 'insertTable'
                            ]
                        } )
                        .catch( error => {
                            console.error( error );
                        } );
                    "
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                placeholder="Type course content"
                >
                @if (isset($course->textContent->content)) {{$course->textContent->content}} @endif
            </textarea>
                
            </div>
        </div>
    @endif
    @error('course_text')
        <div class="alert alert-danger dark:text-red-500">{{ $message }}</div>
    @enderror
    
</div>
