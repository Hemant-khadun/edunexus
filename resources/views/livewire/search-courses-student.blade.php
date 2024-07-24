<div>
    <div class=" flex items-center justify-between pb-6">
        <div>
            <h2 class="text-gray-600 dark:text-gray-200 font-semibold">Courses</h2>
            <span class="text-xs dark:text-slate-400">All courses items</span>
        </div>
        <div class="flex items-center justify-between flex-wrap px-8">
            <div class="flex bg-gray-50 dark:bg-slate-700 items-center p-2 rounded-md">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-400 dark:text-slate-200" viewBox="0 0 20 20"
                    fill="currentColor">
                    <path fill-rule="evenodd"
                        d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z"
                        clip-rule="evenodd" />
                </svg>
                <input class="bg-gray-50 dark:bg-slate-700 dark:placeholder-white dark:text-white outline-none ml-1 block border-none" type="text" wire:model.live="search" placeholder="Search...">

          </div>
                <div class="lg:ml-40 ml-10 space-x-8">
                    @if(Auth::user()->getRoleAttribute() == 'Administrator' || Auth::user()->getRoleAttribute() == 'Tutor' )
                        <a href="{{route('course.create')}}">
                            <button type="button" class="mt-6 text-white bg-gradient-to-r from-teal-400 via-teal-500 to-teal-600 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-teal-300 dark:focus:ring-teal-800 shadow-lg shadow-teal-500/50 dark:shadow-lg dark:shadow-teal-800/80 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2">Add new course</button>
                        </a>
                    @endif
                </div>
            </div>
        </div>
        <div>
            <div class="-mx-4 sm:-mx-8 px-4 sm:px-8 py-4 overflow-x-auto">
                <div class="inline-block min-w-full shadow rounded-lg overflow-hidden">
                    <section id="features" class="px-2 space-y-6 py-8 md:py-12 lg:py-24 max-w-5xl mx-auto">
                        <div class="mx-auto flex max-w-[58rem] flex-col items-center space-y-4 text-center">
                            <h2 class="font-heading text-3xl leading-[1.1] sm:text-3xl md:text-6xl dark:text-white">Courses</h2>
                            <p class="max-w-[85%] leading-normal text-muted-foreground sm:text-lg sm:leading-7 dark:text-gray-200">
                                Emphasize the joy of learning rather than solely focusing on grades or achievements. Celebrate their efforts and progress.
                        </div>
                        
                        <div class="mx-auto grid justify-center gap-4 sm:grid-cols-2 md:max-w-[64rem] md:grid-cols-2">
                            @foreach ($courses as $course)

                                <div class="relative overflow-hidden rounded-lg border bg-gray-100/50 dark:bg-slate-700 p-2">
                                    @if( Auth::user()->getFollowerById( Auth::user()->id, $course->id, 1))
                                    <a href="{{ route('course.learn', $course->id) }}">
                                    @endif
                                        <div class="flex flex-col justify-between rounded-md p-6 dark:text-white">
                                            <div class="py-3">
                                                <svg version="1.1" width="48" height="48" class="dark:fill-white" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 122.88 101.37" style="enable-background:new 0 0 122.88 101.37" xml:space="preserve"><g><path d="M12.64,77.27l0.31-54.92h-6.2v69.88c8.52-2.2,17.07-3.6,25.68-3.66c7.95-0.05,15.9,1.06,23.87,3.76 c-4.95-4.01-10.47-6.96-16.36-8.88c-7.42-2.42-15.44-3.22-23.66-2.52c-1.86,0.15-3.48-1.23-3.64-3.08 C12.62,77.65,12.62,77.46,12.64,77.27L12.64,77.27z M103.62,19.48c-0.02-0.16-0.04-0.33-0.04-0.51c0-0.17,0.01-0.34,0.04-0.51V7.34 c-7.8-0.74-15.84,0.12-22.86,2.78c-6.56,2.49-12.22,6.58-15.9,12.44V85.9c5.72-3.82,11.57-6.96,17.58-9.1 c6.85-2.44,13.89-3.6,21.18-3.02V19.48L103.62,19.48z M110.37,15.6h9.14c1.86,0,3.37,1.51,3.37,3.37v77.66 c0,1.86-1.51,3.37-3.37,3.37c-0.38,0-0.75-0.06-1.09-0.18c-9.4-2.69-18.74-4.48-27.99-4.54c-9.02-0.06-18.03,1.53-27.08,5.52 c-0.56,0.37-1.23,0.57-1.92,0.56c-0.68,0.01-1.35-0.19-1.92-0.56c-9.04-4-18.06-5.58-27.08-5.52c-9.25,0.06-18.58,1.85-27.99,4.54 c-0.34,0.12-0.71,0.18-1.09,0.18C1.51,100.01,0,98.5,0,96.64V18.97c0-1.86,1.51-3.37,3.37-3.37h9.61l0.06-11.26 c0.01-1.62,1.15-2.96,2.68-3.28l0,0c8.87-1.85,19.65-1.39,29.1,2.23c6.53,2.5,12.46,6.49,16.79,12.25 c4.37-5.37,10.21-9.23,16.78-11.72c8.98-3.41,19.34-4.23,29.09-2.8c1.68,0.24,2.88,1.69,2.88,3.33h0V15.6L110.37,15.6z M68.13,91.82c7.45-2.34,14.89-3.3,22.33-3.26c8.61,0.05,17.16,1.46,25.68,3.66V22.35h-5.77v55.22c0,1.86-1.51,3.37-3.37,3.37 c-0.27,0-0.53-0.03-0.78-0.09c-7.38-1.16-14.53-0.2-21.51,2.29C79.09,85.15,73.57,88.15,68.13,91.82L68.13,91.82z M58.12,85.25 V22.46c-3.53-6.23-9.24-10.4-15.69-12.87c-7.31-2.8-15.52-3.43-22.68-2.41l-0.38,66.81c7.81-0.28,15.45,0.71,22.64,3.06 C47.73,78.91,53.15,81.64,58.12,85.25L58.12,85.25z"/></g></svg>
                                            </div>
                                            <div class="space-y-2">
                                                <h3 class="font-bold dark:text-white">@if (isset($course->title)) {{$course->title}}  @endif</h3>
                                                <p class="text-sm text-muted-foreground dark:text-gray-200">@if (isset($course->description)) {{ Illuminate\Support\Str::limit($course->description, 50) }}  @endif
                                                </p>
                                                <div class="w-full text-right pt-3">
                                                    <div class="w-full flex justify-between">
                                                        <span class="text-gray-900 whitespace-no-wrap dark:text-slate-300">By {{$course->author->name}}</span>
                                                        

                                                        @if(Auth::user()->getRoleAttribute() == 'Student' )
                                                            <td class="px-5 py-5 border-b border-gray-200 bg-white dark:bg-slate-700 dark:border-gray-800 text-sm">
                                                                    @if(!Auth::user()->getFollowerById( Auth::user()->id , $course->id, 0) && !Auth::user()->getFollowerById(Auth::user()->id , $course->id, 1))
                                                                            <div class="flex">
                                                                                <form id="accept-follow-form" action="{{ route('follower.send.request', $course->id) }}" method="POST" >
                                                                                    @csrf
                                                                                    @method('PUT')
                                                                                    <button type="submit" class="text-white bg-gradient-to-r from-cyan-400 via-cyan-500 to-cyan-600 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-cyan-300 dark:focus:ring-cyan-800 shadow-lg shadow-cyan-500/50 dark:shadow-lg dark:shadow-cyan-800/80 font-medium rounded-lg text-sm px-5 py-2.5 text-center">Enroll</button>
                                                                                </form>
                                                                            </div>
                                                                        @else
                                                                        <div class="flex">
                                                                            <form id="accept-follow-form" action="{{ route('follower.cancel.request', $course->id) }}" method="POST" >
                                                                                @csrf
                                                                                @method('PUT')
                                                                                <button type="submit" class=" group-hover:visible text-white bg-gradient-to-r from-red-400 via-red-500 to-red-600 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 shadow-lg shadow-red-500/50 dark:shadow-lg dark:shadow-red-800/80 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2"> @if( Auth::user()->getFollowerById( Auth::user()->id, $course->id, 1)) Unenroll @else Cancel Request @endif </button>
                                                                            </form>
                                                                        </div>
                                                                    @endif
                                                            </td>
                                                        @endif
                                                    </div>
                                                
                                                    <div class="flex justify-between pt-2">
                                                        <p class="text-gray-900 whitespace-no-wrap dark:text-slate-300">Published at </p>
                                                        <p class="text-gray-900 whitespace-no-wrap dark:text-slate-300">
                                                            @if (isset($course->created_at))
                                                                {{ $course->created_at->format('F j, Y') }}
                                                            @endif
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        @if( Auth::user()->getFollowerById( Auth::user()->id, $course->id, 1))
                                            </a>
                                        @endif
                                </div>
                                @endforeach
                            </div>
                    </section>
                </div>
            </div>
        </div>
    </div>
</div>
