<div>
    <div class=" flex items-center justify-between pb-6">
        <div>
            <h2 class="text-gray-600 dark:text-gray-200 font-semibold">Contents</h2>
            <span class="text-xs dark:text-slate-400">All course's contents items</span>
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
                        <a href="{{route('content.create', [ 'id' => request()->route('id')])}}">
                            <button type="button" class="mt-6 text-white bg-gradient-to-r from-teal-400 via-teal-500 to-teal-600 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-teal-300 dark:focus:ring-teal-800 shadow-lg shadow-teal-500/50 dark:shadow-lg dark:shadow-teal-800/80 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2">Add new content</button>
                        </a>
                    @endif
                </div>
            </div>
        </div>

        @if( Auth::user()->getRoleAttribute() == 'Administrator' )
        <div>
            <div class="-mx-4 sm:-mx-8 px-4 sm:px-8 py-4 overflow-x-auto">
                <div class="inline-block min-w-full shadow rounded-lg overflow-hidden">
                    <table class="min-w-full leading-normal">
                        <thead>
                            <tr>
                                <th
                                    class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 dark:bg-slate-700 dark:border-gray-800 dark: text-left text-xs font-semibold text-gray-600 dark:text-gray-200 uppercase tracking-wider">
                                    Topic
                                </th>
                                <th
                                    class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 dark:bg-slate-700 dark:border-gray-800 dark: text-left text-xs font-semibold text-gray-600 dark:text-gray-200 uppercase tracking-wider">
                                    Title
                                </th>
                                <th
                                    class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 dark:bg-slate-700 dark:border-gray-800 text-left text-xs font-semibold text-gray-600 dark:text-gray-200 uppercase tracking-wider">
                                    Grade
                                </th>
                                <th
                                    class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 dark:bg-slate-700 dark:border-gray-800 text-left text-xs font-semibold text-gray-600 dark:text-gray-200 uppercase tracking-wider">
                                    Subject
                                </th>
                                <th
                                    class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 dark:bg-slate-700 dark:border-gray-800 text-left text-xs font-semibold text-gray-600 dark:text-gray-200 uppercase tracking-wider">
                                    Material Type
                                </th>
                                <th
                                    class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 dark:bg-slate-700 dark:border-gray-800 text-left text-xs font-semibold text-gray-600 dark:text-gray-200 uppercase tracking-wider">
                                    Author
                                </th>
                                <th
                                    class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 dark:bg-slate-700 dark:border-gray-800 text-left text-xs font-semibold text-gray-600 dark:text-gray-200 uppercase tracking-wider">
                                    Created at
                                </th>
                                
                                @if(Auth::user()->getRoleAttribute() == 'Administrator' || Auth::user()->getRoleAttribute() == 'Tutor' )
                                <th
                                    class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 dark:bg-slate-700 dark:border-gray-800 text-left text-xs font-semibold text-gray-600 dark:text-gray-200 uppercase tracking-wider">
                                    Edit
                                </th>
                                <th
                                    class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 dark:bg-slate-700 dark:border-gray-800 text-left text-xs font-semibold text-gray-600 dark:text-gray-200 uppercase tracking-wider">
                                    Delete
                                </th>
                                @elseif (Auth::user()->getRoleAttribute() == 'Student')
                                <th
                                    class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 dark:bg-slate-700 dark:border-gray-800 text-left text-xs font-semibold text-gray-600 dark:text-gray-200 uppercase tracking-wider">
                                    View
                                </th>
                                @endif

                            </tr>
                        </thead>
                        <tbody>
                            <?php $previousTopic = ''; ?>
                            @foreach ($courses as $course)
                                <tr>
                                    @if($previousTopic != $course->topics->name )
                                    <td class="px-5 py-5 border-b border-gray-200 bg-white dark:bg-slate-700 dark:border-gray-800 text-sm">
                                        <div class="flex items-center">
                                                <div class="ml-3">
                                                <p class="@if (isset($course->topics->name)) {{ $colors[$course->topics->name] }} @endif whitespace-no-wrap ">
                                                    @if (isset($course->topics->name)) {{$course->topics->name}} @endif
                                                </p>
                                            </div>
                                        </div>
                                    </td>
                                    @else
                                    <td class="px-5 py-5 border-b border-gray-200 bg-white dark:bg-slate-700 dark:border-gray-800 text-sm">
                                    </td>
                                    @endif
                                    <td class="px-5 py-5 border-b border-gray-200 bg-white dark:bg-slate-700 dark:border-gray-800 text-sm">
                                        <div class="flex items-center">
                                                <div class="ml-3">
                                                <p class="text-gray-900 whitespace-no-wrap dark:text-slate-300">
                                                    @if (isset($course->course_name)) {{$course->course_name}} @endif
                                                </p>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="px-5 py-5 border-b border-gray-200 bg-white dark:bg-slate-700 dark:border-gray-800 text-sm">
                                        <p class="text-gray-900 whitespace-no-wrap dark:text-slate-300">
                                            @if (isset($course->program_id))
                                                {{ $course->program->title }}
                                            @endif
                                        </p>
                                    </td>
                                    <td class="px-5 py-5 border-b border-gray-200 bg-white dark:bg-slate-700 dark:border-gray-800 text-sm">
                                        <p class="text-gray-900 whitespace-no-wrap dark:text-slate-300">
                                            @if (isset($course->subject_id))
                                                {{ $course->subject->title }}
                                            @endif
                                        </p>
                                    </td>
                                    <td class="px-5 py-5 border-b border-gray-200 bg-white dark:bg-slate-700 dark:border-gray-800 text-sm">
                                        <p class="text-gray-900 whitespace-no-wrap dark:text-slate-300">
                                            @if (isset($course->material_id))
                                                {{ $course->material->title }}
                                            @endif
                                        </p>
                                    </td>
                                    <td class="px-5 py-5 border-b border-gray-200 bg-white dark:bg-slate-700 dark:border-gray-800 text-sm">
                                        <p class="text-gray-900 whitespace-no-wrap dark:text-slate-300">
                                            @if (isset($course->author->name))
                                                {{ $course->author->name }}
                                            @endif
                                        </p>
                                    </td>
                                    <td class="px-5 py-5 border-b border-gray-200 bg-white dark:bg-slate-700 dark:border-gray-800 text-sm">
                                        <p class="text-gray-900 whitespace-no-wrap dark:text-slate-300">
                                            @if (isset($course->created_at))
                                                {{ $course->created_at->format('F j, Y') }}
                                            @endif
                                        </p>
                                    </td>
                                @if(Auth::user()->getRoleAttribute() == 'Administrator' || Auth::user()->getRoleAttribute() == 'Tutor' )
                                    <td class="px-5 py-5 border-b border-gray-200 bg-white dark:bg-slate-700 dark:border-gray-800 text-sm">
                                            <div class="flex">
                                                <a href="{{ route('content.edit', ['id' =>$course->id, 'wid' => request()->route('id') ]) }}">
                                                    <button type="button" class=" group-hover:visible text-white bg-gradient-to-r from-green-400 via-green-500 to-green-600 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-green-300 dark:focus:ring-green-800 shadow-lg shadow-green-500/50 dark:shadow-lg dark:shadow-green-800/80 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2">Edit</button>
                                                </a>
                                            </div>
                                    </td>
                                    <td class="px-5 py-5 border-b border-gray-200 bg-white dark:bg-slate-700 dark:border-gray-800 text-sm">
                                        <div class="flex">
                                            <a href="{{ route('content.destroy', $course->id) }}" >
                                                <form id="delete-form" action="{{ route('content.destroy', $course->id) }}" method="POST" >
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class=" group-hover:visible text-white bg-gradient-to-r from-red-400 via-red-500 to-red-600 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 shadow-lg shadow-red-500/50 dark:shadow-lg dark:shadow-red-800/80 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2">Remove</button>
                                                </form>
                                            </a>
                                        </div>
                                    </td>
                                @elseif (Auth::user()->getRoleAttribute() == 'Student')
                                    <td class="px-5 py-5 border-b border-gray-200 bg-white dark:bg-slate-700 dark:border-gray-800 text-sm">
                                        <div class="flex">
                                            <a href="{{ route('course.learn', $course->id) }}">
                                                <button type="button" class=" group-hover:visible text-white bg-gradient-to-r from-green-400 via-green-500 to-green-600 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-green-300 dark:focus:ring-green-800 shadow-lg shadow-green-500/50 dark:shadow-lg dark:shadow-green-800/80 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2">View</button>
                                            </a>
                                        </div>
                                    </td>
                                @endif
                                </tr>
                                <?php $previousTopic = $course->topics->name; ?>
                            @endforeach
                        </tbody>
                    </table>
                    {{-- <div
                        class="px-5 py-5 bg-white border-t flex flex-col xs:flex-row items-center xs:justify-between          ">
                        <span class="text-xs xs:text-sm text-gray-900">
                            Showing 1 to 4 of 50 Entries
                        </span>
                        <div class="inline-flex mt-2 xs:mt-0">
                            <button
                                class="text-sm text-indigo-50 transition duration-150 hover:bg-indigo-500 bg-indigo-600 font-semibold py-2 px-4 rounded-l">
                                Prev
                            </button>
                            &nbsp; &nbsp;
                            <button
                                class="text-sm text-indigo-50 transition duration-150 hover:bg-indigo-500 bg-indigo-600 font-semibold py-2 px-4 rounded-r">
                                Next
                            </button>
                        </div>
                    </div> --}}
                </div>
            </div>
        </div>
        @else
       

            <div class='flex items-center justify-center' >
                <div class='w-full px-10 py-3 mx-auto bg-slate-700 rounded-lg shadow-xl'>
                    <div class='mx-auto space-y-6'>
                
                        <?php $previousTopic = ''; ?>
                        @foreach ($courses as $index => $course)
            
                        @if($previousTopic != $course->topics->name )

                            @if($previousTopic != $course->topics->name && $index != 0 )
                                        </div>
                                
                                    </div>

                                </div>

                            @endif

                            <div x-data="{ reportsOpen: false }">
                            <div @click="reportsOpen = !reportsOpen" class='flex items-center text-gray-600 w-fulloverflow-hidden mt-32 md:mt-0 mb-5 mx-auto'>
                                <div class='w-10 border-none px-2 transform transition duration-300 ease-in-out' :class="{'rotate-90': reportsOpen,' -translate-y-0.0': !reportsOpen }">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="dark:text-white" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 8.25l-7.5 7.5-7.5-7.5" />
                                    </svg>          
                                </div>
                                <div class='flex items-center px-2 py-3'>
                                    <div class='mx-3'>
                                        <button class="dark:text-white" >
                                            @if(isset($course->topics->name)) {{$course->topics->name}} @endif
                                        </button>
                                    </div>
                                </div>
                            </div>

                            <div class="flex p-5 md:p-0 w-full transform transition duration-300 ease-in-out border-b pb-10 dark:text-white border-none"
                            x-cloak x-show="reportsOpen" x-collapse x-collapse.duration.500ms >
                            
                            <div class="flex flex-wrap justify-left w-full">

                        @endif


                            <div class="flex rounded-lg dark:bg-gray-800 bg-teal-400 p-8 flex-col w-full">
                                <div class="flex items-center mb-3">
                                    <div
                                        class="w-8 h-8 mr-3 inline-flex items-center justify-center rounded-full dark:bg-indigo-500 bg-indigo-500 text-white flex-shrink-0">
                                        <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                            stroke-width="2" class="w-5 h-5" viewBox="0 0 24 24">
                                            <path d="M22 12h-4l-3 9L9 3l-3 9H2"></path>
                                        </svg>
                                    </div>
                                    <h2 class="text-gray-700 dark:text-white text-lg font-medium">@if (isset($course->course_name)) {{$course->course_name}} @endif</h2>
                                </div>
                                <div class="flex flex-col justify-between flex-grow">
                                    <p class="leading-relaxed text-base  text-gray-700 dark:text-gray-300">
                                        {{ Illuminate\Support\Str::limit($course->description, 50) }}
                                    </p>
                                    <div class="flex justify-between">

                                        <div class="mt-3 text-gray-500">
                                            @if (isset($course->created_at))
                                                {{ $course->created_at->format('F j, Y') }}
                                            @endif
                                        </div>

                                        <div class="flex">
                                            <a href="{{ route('content.edit', ['id' =>$course->id, 'wid' => request()->route('id') ]) }}">
                                                <button type="button" class=" group-hover:visible text-white bg-gradient-to-r from-green-400 via-green-500 to-green-600 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-green-300 dark:focus:ring-green-800 shadow-lg shadow-green-500/50 dark:shadow-lg dark:shadow-green-800/80 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2 flex align-middle">
                                                    <span>
                                                        Edit
                                                    </span>
                                                        <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                                        stroke-width="2" class="w-4 ml-2" viewBox="0 0 24 24">
                                                        <path d="M5 12h14M12 5l7 7-7 7"></path>
                                                </button>

                                            </svg>
                                            </a>
                                            <a href="{{ route('content.destroy', $course->id) }}" >
                                                <form id="delete-form" action="{{ route('content.destroy', $course->id) }}" method="POST" >
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class=" group-hover:visible text-white bg-gradient-to-r from-red-400 via-red-500 to-red-600 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 shadow-lg shadow-red-500/50 dark:shadow-lg dark:shadow-red-800/80 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2">Remove</button>
                                                </form>
                                            </a>
                                        </div>
                                    </div>

                                </div>
                            </div>
                            
                     
                        <?php $previousTopic = $course->topics->name; ?>

                        @endforeach

                    </div>
                </div>
            </div>
            
            
            <div>
            
        </div>
        @endif
    </div>
</div>
