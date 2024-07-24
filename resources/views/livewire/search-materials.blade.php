<div>
    <div class=" flex items-center justify-between pb-6">
        <div>
            <h2 class="text-gray-600 dark:text-gray-200 font-semibold">Materials</h2>
            <span class="text-xs dark:text-slate-400">All material items</span>
        </div>
        <div class="flex items-center justify-between flex-wrap px-8">
            <div class="flex bg-gray-50 dark:bg-slate-700 items-center p-2 rounded-md">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-400 dark:text-slate-200" viewBox="0 0 20 20"
                    fill="currentColor">
                    <path fill-rule="evenodd"
                        d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z"
                        clip-rule="evenodd" />
                </svg>
                <input class="bg-gray-50 dark:bg-slate-700 outline-none ml-1 block border-none dark:placeholder-white dark:text-white" type="text" wire:model.live="search" placeholder="Search...">

          </div>
                <div class="lg:ml-40 ml-10 space-x-8">
                    @if(Auth::user()->getRoleAttribute() == 'Administrator')
                        <a href="{{route('material.create')}}">
                            {{-- <button type="button" class="mt-6 text-white bg-gradient-to-r from-teal-400 via-teal-500 to-teal-600 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-teal-300 dark:focus:ring-teal-800 shadow-lg shadow-teal-500/50 dark:shadow-lg dark:shadow-teal-800/80 dark:text-white font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2">Add new material </button> --}}
                        </a>
                    @endif
                </div>
            </div>
        </div>
        <div>
            <div class="-mx-4 sm:-mx-8 px-4 sm:px-8 py-4 overflow-x-auto">
                <div class="inline-block min-w-full shadow rounded-lg overflow-hidden">
                    <table class="min-w-full leading-normal">
                        <thead>
                            <tr>
                                <th
                                    class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 dark:bg-slate-700 dark:border-gray-800 text-left text-xs font-semibold text-gray-600 dark:text-gray-200 uppercase tracking-wider">
                                    Title
                                </th>
                                <th
                                    class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 dark:bg-slate-700 dark:border-gray-800 text-left text-xs font-semibold text-gray-600 dark:text-gray-200 uppercase tracking-wider">
                                    description
                                </th>
                                <th
                                    class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 dark:bg-slate-700 dark:border-gray-800 text-left text-xs font-semibold text-gray-600 dark:text-gray-200 uppercase tracking-wider">
                                    Created at
                                </th>
                                @if(Auth::user()->getRoleAttribute() == 'Administrator')
                                <th
                                    class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 dark:bg-slate-700 dark:border-gray-800 text-left text-xs font-semibold text-gray-600 dark:text-gray-200 uppercase tracking-wider">
                                    Edit
                                </th>
                                <th
                                    class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 dark:bg-slate-700 dark:border-gray-800 text-left text-xs font-semibold text-gray-600 dark:text-gray-200 uppercase tracking-wider">
                                    Delete
                                </th>
                                @endif
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($materials as $material)

                            <tr>
                                <td class="px-5 py-5 border-b border-gray-200 bg-white dark:bg-slate-700 dark:border-gray-800 text-sm">
                                    <div class="flex items-center">
                                            <div class="ml-3">
                                                <p class="text-gray-900 whitespace-no-wrap dark:text-white">
                                                    @if (isset($material->title)) {{$material->title}} @endif
                                                </p>
                                            </div>
                                        </div>
                                </td>
                                <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm dark:text-white dark:bg-slate-700 dark:border-gray-800">
                                    <p class="text-gray-900 whitespace-no-wrap dark:text-white">@if (isset($material->description)) {{$material->description}} @endif</p>
                                </td>
                                <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm  dark:bg-slate-700 dark:border-gray-800">
                                    <p class="text-gray-900 whitespace-no-wrap dark:text-white">
                                        @if (isset($material->created_at))
                                            {{ $material->created_at->format('F j, Y') }}
                                        @endif
                                    </p>
                                </td>
                                <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm dark:bg-slate-700 dark:border-gray-800">
                                    @if(Auth::user()->getRoleAttribute() == 'Administrator')

                                        <div class="flex">
                                            <a href="{{ route('material.edit', $material->id) }}">
                                                <button type="button" class=" group-hover:visible text-white bg-gradient-to-r from-green-400 via-green-500 to-green-600 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-green-300 dark:focus:ring-green-800 shadow-lg shadow-green-500/50 dark:shadow-lg dark:shadow-green-800/80 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2">Edit</button>
                                            </a>
                                        </div>
                                        @endif
                                </td>
                                <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm dark:bg-slate-700 dark:border-gray-800">
                                    @if(Auth::user()->getRoleAttribute() == 'Administrator')

                                        <div class="flex">
                                            <a href="{{ route('material.destroy', $material->id) }}"->
                                                <form id="delete-form" action="{{ route('material.destroy', $material->id) }}" method="POST"->
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class=" group-hover:visible text-white bg-gradient-to-r from-red-400 via-red-500 to-red-600 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 shadow-lg shadow-red-500/50 dark:shadow-lg dark:shadow-red-800/80 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2">Remove</button>
                                                </form>
                                            </a>
                                        </div>
                                    @endif
                                </td>
                            </tr>
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
    </div>
</div>
