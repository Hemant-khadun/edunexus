<section class="max-w-5xl mx-auto py-10 sm:py-20">
    <div class="flex items-center justify-center flex-col gap-y-2 py-5">
        <h2 class="text-2xl md:text-3xl lg:text-4xl font-bold dark:text-white">{{$title}} by {{$author}}</h2>
        <p class="text-lg font-medium text-slate-700/70 dark:text-white">Course questions are like curious adventures. They help us explore and understand better</p>
    </div>

    <div id="student-filter" class="flex justify-end">
        <button id="dropdownDefaultButton" data-dropdown-toggle="dropdown" class="text-white bg-gray-900 hover:bg-blue-900 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-center dark:bg-blue-900 dark:hover:bg-blue-800 dark:focus:ring-blue-900" type="button">Filter By Category <svg class="w-2.5 h-2.5 ms-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 4 4 4-4"/>
            </svg>
        </button>
            
        <!-- Dropdown menu -->
        <div id="dropdown" class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-gray-700">
            <ul class="py-2 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="dropdownDefaultButton">
                <li>
                    <a href="#" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white" data-id="0">View all</a>
                </li>
                @foreach( $categories as $category)
                    <li>
                        <a href="#" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white" data-id="{{$category->id}}">{{$category->title}}</a>
                    </li>
                @endforeach
            </ul>
        </div>
        
    </div>

    @foreach($courses as $index => $groupCourses)

    <div class="w-full px-7 md:px-10 xl:px-2 py-4">
        <div class="mx-auto w-full max-w-5xl border border-slate-400/20 rounded-lg bg-white dark:bg-slate-800 dark:border-slate-700 shadow-2xl">
            <h2 class="text-center py-3 dark:text-white text-gray-700 text-2xl">{{$groupCourses[0]->topics->name}}</h2>
        @foreach ($groupCourses as $indexCourse => $course)
            
            <div id="content" class="border-[#0A071B]/10 dark:border-black" data-category="{{$course->category_id}}">

                <button class="question-btn flex w-full items-start gap-x-5 justify-between rounded-lg text-left text-lg font-bold text-slate-800 focus:outline-none p-5 dark:text-gray-200" data-toggle="answer-{{$index}}-{{$indexCourse}}">
                    <span class="flex gap-2 items-center">{{$course->course_name}}
                        
                        @if(isset($completed[$course->id]) && $completed[$course->id] == 1)
                            <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                        @endif

                    </span>
                    <svg id="arrow" stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 24 24" class=" mt-1.5 md:mt-0 flex-shrink-0 rotate-180 transform h-5 w-5 text-[#5B5675]" height="1em" width="1em" xmlns="http://www.w3.org/2000/svg"><path d="M16.293 9.293 12 13.586 7.707 9.293l-1.414 1.414L12 16.414l5.707-5.707z"></path></svg>
                </button>

                <div class="answer pt-2 pb-5 px-5 text-sm lg:text-base text-[#343E3A] font-medium dark:text-gray-400" @if(isset($showQuestionAccordion) && $showQuestionAccordion != $course->id)style="display:none"@endif id="answer-{{$index}}-{{$indexCourse}}" >

                        @if($course->material->title == 'Quiz')
                            <h2 class="text-left py-6 text-white text-2xl">Complete this quiz to earn your certificate</h2>
                        @endif

                        <span class="py-6">{{$course->description}}</span>

                                        @if($course->material->title == 'Video')
                                            @if ($course->media->isNotEmpty())
                            
                                            <div class="flex justify-center py-6">
                                    
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
                                            </div>
                                                <!-- End: Modal video component -->
                                            @endif
                                        
                                        @elseif ($course->material->title == 'File')

                                            @if($isPdf)

                                                <div x-data="{ 'showModal': false }" @keydown.escape="showModal = false">
                                                    <!-- Trigger for Modal -->
                                                    <button type="button" @click="showModal = true" class="mt-3 text-white bg-gradient-to-r from-purple-500 via-purple-600 to-purple-700 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-purple-300 dark:focus:ring-purple-800 shadow-lg shadow-purple-500/50 dark:shadow-lg dark:shadow-purple-800/80 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2">Preview Explanation</button>
                                                    <!-- Modal -->
                                                    <div class="fixed inset-0 z-30 flex items-center justify-center overflow-auto bg-black bg-opacity-50" x-show="showModal">
                                                        <!-- inner modal -->
                                                        <div class=" px-6 py-4 mx-auto text-left bg-white rounded shadow-lg" @click.away="showModal = false">
                                                            <!-- Title / Close -->
                                                            <div class="flex items-center justify-between">
                                                                <h5 class="mr-3 text-black max-w-none"></h5>
                                                                <button class="z-50 cursor-pointer" @click="showModal = false">
                                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor">
                                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                                                                    </svg>
                                                                </button>
                                                            </div>
                                                                <object 
                                                                        data="{{ $course->media->first()->getUrl() }}"
                                                                        width="800"
                                                                        height="500">
                                                                </object>
                                                        </div>
                                                    </div>
                                                </div>
                                            @else
                                                <a href="{{ $course->media->first()->getUrl() }}" class="mt-3 text-white bg-gradient-to-r from-purple-500 via-purple-600 to-purple-700 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-purple-300 dark:focus:ring-purple-800 shadow-lg shadow-purple-500/50 dark:shadow-lg dark:shadow-purple-800/80 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2">Preview Explanation</a>
                                            @endif
                                        @elseif ($course->material->title == 'Quiz')

                                        @foreach($course->quiz as $quiz)

                                        <h2 class="pt-6 text-left text-gray-400 text-2xl">{{$quiz->question}}</h2>

                                        <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-1 gap-2 p-4">
                                            @foreach($quiz->quizAnswers as $choices)
                                                <label>

                                                    <input type="radio" wire:click="saveAndValidateAnswer({{$choices->id}} , {{$course->id}})" value="{{$choices->id}}" class="peer hidden" name="framework_{{$quiz->id}}" @if(isset($isGoodAnswer[$choices->id]) && $isGoodAnswer[$choices->id]) checked @endif>
                                                    
                                                    <div class="hover:bg-gray-50 dark:hover:bg-gray-700 flex items-center justify-between px-4 py-2 border-2 rounded-lg cursor-pointer text-sm border-gray-200 group @if(isset($isGoodAnswer[$choices->id]) && $isGoodAnswer[$choices->id]) peer-checked:border-blue-500 @else peer-checked:border-blue-500 @endif">
                                                        <h2 class="font-medium text-gray-700 dark:text-white  ">{{$choices->answer}}</h2>
                                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-9 h-9 @if(isset($isGoodAnswer[$choices->id]) &&  $isGoodAnswer[$choices->id]) text-blue-600 @else text-red-600  @endif invisible group-[.peer:checked+&]:visible">
                                                            <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                                        </svg>
                                                    </div>
                                                </label>
                                            @endforeach
                                        </div>

                                        @endforeach

                                        @elseif ($course->material->title == 'Text')
                                            <div class="p-3 front-text-content">
                                                {!! $course->textContent->content !!}
                                            </div>
                                        @endif
                                        
                                        @if($course->material->title != 'Quiz')
                                        <div class="w-full flex justify-end">
                                                <a href="#" @if(!isset($completed[$course->id])) wire:click="markAsComplete('{{$course->id}}')" @endif type="button" 
                                                    @if(isset($completed[$course->id]) && $completed[$course->id] == 1)
                                                        class="text-white bg-gradient-to-r from-green-400 via-green-500 to-green-600 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-green-300 dark:focus:ring-green-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2 flex gap-2 items-center"
                                                    @else
                                                        class="text-white bg-gradient-to-r from-cyan-400 via-cyan-500 to-cyan-600 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-cyan-300 dark:focus:ring-cyan-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2 flex gap-2 items-center"
                                                    @endif
                                                    >

                                                    @if(isset($completed[$course->id]) && $completed[$course->id] == 1)
                                                        Completed
                                                    @else
                                                        Mark as complete 
                                                    @endif

                                                    <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                                                        <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                                    </svg>
                                                </a>
                                            </div>
                                         @endif
                            </div>
                        </div>

                        @endforeach
                        
                    </div>
                </div>
            </div>
            
        @endforeach
</section>