<div class="bg-white  dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg px-8 pb-8">
    @if(Auth::user()->getRoleAttribute() == 'Administrator')

        <a href="{{route('program.create')}}">
            <button type="button" class="mt-6 text-white bg-gradient-to-r from-teal-400 via-teal-500 to-teal-600 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-teal-300 dark:focus:ring-teal-800 shadow-lg shadow-teal-500/50 dark:shadow-lg dark:shadow-teal-800/80 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2">Add new grade</button>
        </a>

    @endif

    <div class="mt-8 grid grid-cols-2 gap-6 md:grid-cols-4">
        
        @foreach ($programs as $program)
            <span wire:click="selectGrade({{ $program->id }})" class="group relative grid w-full min-w-[7rem] transform cursor-pointer place-items-center rounded-xl border border-blue-gray-50 bg-white dark:bg-slate-600 dark:border-slate-500 px-3 py-2 transition-all hover:scale-105 hover:border-blue-gray-100 hover:bg-blue-gray-50 hover:bg-opacity-25">
                <span class="my-6 grid h-24 w-24 place-items-center">
                    @if(auth()->user()->getRoleAttribute() != 'Administrator')
                        @if($program->id == $selectedGrade)
                            <span class="absolute bottom-5 right-5">
                                <svg class="h-6 w-6" xmlns:inkscape="http://www.inkscape.org/namespaces/inkscape" xmlns:rdf="http://www.w3.org/1999/02/22-rdf-syntax-ns#" xmlns="http://www.w3.org/2000/svg" xmlns:cc="http://creativecommons.org/ns#" xmlns:dc="http://purl.org/dc/elements/1.1/" xmlns:sodipodi="http://sodipodi.sourceforge.net/DTD/sodipodi-0.dtd" xmlns:svg="http://www.w3.org/2000/svg" xmlns:ns1="http://sozi.baierouge.fr" xmlns:xlink="http://www.w3.org/1999/xlink" id="svg2" sodipodi:docname="checkmarks_ocal081028_f1.svg" viewBox="0 0 190 190" sodipodi:version="0.32" version="1.0" inkscape:output_extension="org.inkscape.output.svg.inkscape" inkscape:version="0.46">
                                    <g id="layer1" inkscape:label="Layer 1" inkscape:groupmode="layer" transform="translate(-73.248 -53.178)">
                                        <g id="g2414" inkscape:label="Layer 1" transform="translate(-123.39 12.728)">
                                        <path id="path2418" sodipodi:nodetypes="csssccssssccc" d="m289.67 57.934c-45.77 0-83.03 37.263-83.03 83.026 0 45.77 37.26 83.03 83.03 83.03s83.03-37.26 83.03-83.03c0-19.78-6.7-37.48-18.07-51.972l-7.81 9.266c9.91 12.206 13.79 25.756 13.79 42.706 0 39.22-31.72 70.92-70.94 70.92s-70.94-31.7-70.94-70.92 31.72-70.934 70.94-70.934c12.43 0 21.72 1.786 31.87 7.391l7.43-9.754c-11.88-6.562-24.8-9.729-39.3-9.729z" style="fill-rule:evenodd;fill:#85f475;"/>
                                        <path id="path2510" style="fill:#85f475;" d="m258.94 130.04c3.35 0 5.88 2.75 7.6 8.25 3.43 10.3 5.88 15.45 7.34 15.45 1.11 0 2.27-0.86 3.47-2.58 24.13-38.63 46.45-69.879 66.97-93.745 5.32-6.181 13.78-9.272 25.37-9.272 2.74 0 4.59 0.258 5.53 0.773 0.95 0.515 1.42 1.159 1.42 1.931 0 1.202-1.42 3.563-4.25 7.083-33.14 39.835-63.87 81.9-92.2 126.2-1.98 3.09-6.01 4.64-12.11 4.64-6.18 0-9.83-0.26-10.94-0.78-2.92-1.28-6.36-7.85-10.31-19.7-4.46-13.13-6.69-21.38-6.69-24.72 0-3.61 3-7.09 9.01-10.44 3.69-2.06 6.96-3.09 9.79-3.09"/>
                                        </g>
                                    </g>
                                </svg>
                            </span>
                        @endif
                    @endif

                    <span class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">@if (isset($program->title)) {{$program->title}} @endif</span>
                    <!-- Display the program thumbnail (you can adjust this part) -->
                    @if ($program->media->isNotEmpty())
                        <img src="{{ $program->media->first()->getUrl() }}" alt="{{ $program->title }}" class="w-16 h-16 rounded-full">
                    @else
                        <!-- Handle the case when no media is associated -->
                        <span>No thumbnail available</span>
                    @endif
                </span>

                @if(Auth::user()->getRoleAttribute() == 'Administrator')

                    <div class="flex">
                        <a href="{{ route('program.edit', $program->id) }}">
                            <button type="button" class="invisible group-hover:visible text-white bg-gradient-to-r from-green-400 via-green-500 to-green-600 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-green-300 dark:focus:ring-green-800 shadow-lg shadow-green-500/50 dark:shadow-lg dark:shadow-green-800/80 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2">Edit</button>
                        </a>
                        <a href="{{ route('program.destroy', $program->id) }}" >
                            <form id="delete-form" action="{{ route('program.destroy', $program->id) }}" method="POST" >
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="invisible group-hover:visible text-white bg-gradient-to-r from-red-400 via-red-500 to-red-600 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 shadow-lg shadow-red-500/50 dark:shadow-lg dark:shadow-red-800/80 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2">Remove</button>
                            </form>
                        </a>
                    
                    </div>
                @endif

            </span>

        @endforeach
        
    </div>
</div>