<div>
    <div class=" flex items-center justify-between pb-6">
        <div>
            @if(Auth::user()->getRoleAttribute() != 'Tutor' )
            <h2 class="text-gray-600 dark:text-gray-200 font-semibold">Users</h2>
            <span class="text-xs dark:text-slate-400">All users list</span>
            @else
            <h2 class="text-gray-600 dark:text-gray-200 font-semibold">Enrollement</h2>
            <span class="text-xs dark:text-slate-400">All Courses Enrollement list</span>
            @endif
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

                @if(Auth::user()->getRoleAttribute() == 'Administrator' )

                    <div class="mr-3">
                        <select id="active" wire:model.live="filter_active" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                            <option value="">Any Status</option>
                            <option value="1">Active</option>
                            <option value="0">Inactive</option>
                        </select>
                    </div>
                    <div class="mr-3">
                        <select id="role" wire:model.live="filter_role" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                            <option value="">Any Role</option>
                            <option value="1">Administrator</option>
                            <option value="2">Parent</option>
                            <option value="3">Tutor</option>
                            <option value="4">Student</option>
                        </select>
                    </div>
                    
                @endif

          </div>
          
                <div class="lg:ml-40 ml-10 space-x-8">
                    @if(Auth::user()->getRoleAttribute() == 'Administrator' )
                        {{-- <a href="{{route('user.create')}}">
                            <button type="button" class="mt-6 text-white bg-gradient-to-r from-teal-400 via-teal-500 to-teal-600 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-teal-300 dark:focus:ring-teal-800 shadow-lg shadow-teal-500/50 dark:shadow-lg dark:shadow-teal-800/80 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2">Add new user</button>
                        </a> --}}
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
                                    class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 dark:bg-slate-700 dark:border-gray-800 dark: text-left text-xs font-semibold text-gray-600 dark:text-gray-200 uppercase tracking-wider">
                                    Username
                                </th>
                                @if(Auth::user()->getRoleAttribute() == 'Tutor' )
                                <th class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 dark:bg-slate-700 dark:border-gray-800 dark: text-left text-xs font-semibold text-gray-600 dark:text-gray-200 uppercase tracking-wider">
                                    Course
                                </th>
                                @endif
                                @if(Auth::user()->getRoleAttribute() == 'Administrator' )
                                <th
                                    class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 dark:bg-slate-700 dark:border-gray-800 text-left text-xs font-semibold text-gray-600 dark:text-gray-200 uppercase tracking-wider">
                                    Email
                                </th>
                                <th
                                    class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 dark:bg-slate-700 dark:border-gray-800 text-left text-xs font-semibold text-gray-600 dark:text-gray-200 uppercase tracking-wider">
                                    Created at
                                </th>
                                <th
                                    class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 dark:bg-slate-700 dark:border-gray-800 text-left text-xs font-semibold text-gray-600 dark:text-gray-200 uppercase tracking-wider">
                                    Status
                                </th>
                                <th
                                    class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 dark:bg-slate-700 dark:border-gray-800 text-left text-xs font-semibold text-gray-600 dark:text-gray-200 uppercase tracking-wider">
                                    Active
                                </th>
                               
                                <th
                                    class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 dark:bg-slate-700 dark:border-gray-800 text-left text-xs font-semibold text-gray-600 dark:text-gray-200 uppercase tracking-wider">
                                    Role
                                </th>
                                <th
                                    class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 dark:bg-slate-700 dark:border-gray-800 text-left text-xs font-semibold text-gray-600 dark:text-gray-200 uppercase tracking-wider">
                                    Delete
                                </th>
                                @elseif(Auth::user()->getRoleAttribute() == 'Tutor' || Auth::user()->getRoleAttribute() == 'Student' )
                                    <th
                                        class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 dark:bg-slate-700 dark:border-gray-800 text-left text-xs font-semibold text-gray-600 dark:text-gray-200 uppercase tracking-wider">
                                    Status
                                    </th>
                                @endif
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $user)

                            <tr>
                                <td class="px-5 py-5 border-b border-gray-200 bg-white dark:bg-slate-700 dark:border-gray-800 text-sm">
                                    <div class="flex items-center">
                                            <div class="ml-3">
                                                <p class="text-gray-900 whitespace-no-wrap dark:text-slate-300">
                                                    @if(Auth::user()->getRoleAttribute() != 'Tutor')
                                                        @if (isset($user->name)) {{$user->name}} @endif
                                                    @else
                                                        @if (isset($user->user->name)) {{$user->user->name}} @endif
                                                    @endif
                                                </p>
                                            </div>
                                        </div>
                                </td>
                                @if(Auth::user()->getRoleAttribute() == 'Tutor' )
                                <td class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 dark:bg-slate-700 dark:border-gray-800 dark: text-left text-xs font-semibold text-gray-600 dark:text-gray-200 uppercase tracking-wider">
                                    @if (isset($user->course->title)) {{$user->course->title}} @endif
                                </td>
                                @endif

                                @if(Auth::user()->getRoleAttribute() == 'Administrator' )

                                <td class="px-5 py-5 border-b border-gray-200 bg-white dark:bg-slate-700 dark:border-gray-800 text-sm">
                                    <p class="text-gray-900 whitespace-no-wrap dark:text-slate-300">@if (isset($user->email)) {{$user->email}} @endif</p>
                                </td>

                                <td class="px-5 py-5 border-b border-gray-200 bg-white dark:bg-slate-700 dark:border-gray-800 text-sm">
                                    <p class="text-gray-900 whitespace-no-wrap dark:text-slate-300">
                                        @if (isset($user->created_at))
                                            {{ $user->created_at->format('F j, Y') }}
                                        @endif
                                    </p>
                                </td>


                                <td class="px-5 py-5 border-b border-gray-200 bg-white dark:bg-slate-700 dark:border-gray-800 text-sm">

                                    <p class="text-gray-900 whitespace-no-wrap dark:text-slate-300">
                                        @if (isset($user->status))
                                            @if($user->status == 1)
                                                <div class="flex">
                                                    <form id="block-form" action="{{ route('user.block', $user->id) }}" method="POST" >
                                                        @csrf
                                                        @method('PUT')
                                                        <button type="submit" class=" group-hover:visible text-white bg-gradient-to-r from-red-400 via-red-500 to-red-600 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 shadow-lg shadow-red-500/50 dark:shadow-lg dark:shadow-red-800/80 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2">Block</button>
                                                    </form>
                                                </div>
                                            @else
                                                <div class="flex">

                                                    <form id="unblock-form" action="{{ route('user.unblock', $user->id) }}" method="POST" >
                                                        @csrf
                                                        @method('PUT')
                                                        <button type="submit" class=" group-hover:visible text-white bg-gradient-to-r from-green-400 via-green-500 to-green-600 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-green-300 dark:focus:ring-green-800 shadow-lg shadow-green-500/50 dark:shadow-lg dark:shadow-green-800/80 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2">Unblock</button>
                                                    </form>
                                                </div>
                                            @endif
                                        @endif

                                    </p>
                                        
                                </td>
                                <td class="px-5 py-5 border-b border-gray-200 bg-white dark:bg-slate-700 dark:border-gray-800 text-sm">

                                    <p class="text-gray-900 whitespace-no-wrap dark:text-slate-300">
                                        @if (isset($user->active))
                                            @if($user->active == 0)
                                                <div class="flex">
                                                    <form id="block-form" action="{{ route('user.accept', $user->id) }}" method="POST" >
                                                        @csrf
                                                        @method('PUT')
                                                        <button type="submit" class=" group-hover:visible text-white bg-gradient-to-r from-green-400 via-green-500 to-green-600 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-green-300 dark:focus:ring-green-800 shadow-lg shadow-green-500/50 dark:shadow-lg dark:shadow-green-800/80 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2">Accept</button>
                                                    </form>
                                                </div>
                                            @else
                                            <p class="text-gray-900 whitespace-no-wrap dark:text-slate-300">
                                                Accepted
                                            </p>
                                            @endif
                                        @endif
                                    </p>
                                        
                                </td>

                                <td class="px-5 py-5 border-b border-gray-200 bg-white dark:bg-slate-700 dark:border-gray-800 text-sm">
                                    <p class="text-gray-900 whitespace-no-wrap dark:text-slate-300">
                                        {{ $user->getRoleAttribute() }}
                                    </p>
                                </td>

                                <td class="px-5 py-5 border-b border-gray-200 bg-white dark:bg-slate-700 dark:border-gray-800 text-sm">
                                    <div class="flex">
                                        <a href="{{ route('user.destroy', $user->id) }}" >
                                            <form id="delete-form" action="{{ route('user.destroy', $user->id) }}" method="POST" >
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class=" group-hover:visible text-white bg-gradient-to-r from-red-400 via-red-500 to-red-600 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 shadow-lg shadow-red-500/50 dark:shadow-lg dark:shadow-red-800/80 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2">Remove</button>
                                            </form>
                                        </a>
                                    </div>
                                </td>
                            @endif

                            @if(Auth::user()->getRoleAttribute() == 'Tutor' )
                                <td class="px-5 py-5 border-b border-gray-200 bg-white dark:bg-slate-700 dark:border-gray-800 text-sm">
                                    <p class="text-gray-900 whitespace-no-wrap dark:text-slate-300">
                                        @if(!Auth::user()->getFollowerById( Auth::user()->id , $user->id, 0))
                                                <div class="flex">
                                                    <form id="accept-follow-form" action="{{ route('follower.accept', $user->id) }}" method="POST" >
                                                        @csrf
                                                        @method('PUT')
                                                        <button type="submit" class=" group-hover:visible text-white bg-gradient-to-r from-green-400 via-green-500 to-green-600 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-green-300 dark:focus:ring-green-800 shadow-lg shadow-green-500/50 dark:shadow-lg dark:shadow-green-800/80 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2">Accept</button>
                                                    </form>
                                                </div>
                                            @else
                                            <div class="flex">
                                                <form id="accept-follow-form" action="{{ route('follower.decline', $user->id) }}" method="POST" >
                                                    @csrf
                                                    @method('PUT')
                                                    <button type="submit" class=" group-hover:visible text-white bg-gradient-to-r from-red-400 via-red-500 to-red-600 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 shadow-lg shadow-red-500/50 dark:shadow-lg dark:shadow-red-800/80 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2">Remove</button>
                                                </form>
                                            </div>
                                        @endif
                                    </p>
                                </td>
                            @endif

                            @if(Auth::user()->getRoleAttribute() == 'Student' )
                                <td class="px-5 py-5 border-b border-gray-200 bg-white dark:bg-slate-700 dark:border-gray-800 text-sm">
                                    <p class="text-gray-900 whitespace-no-wrap dark:text-slate-300">
                                        @if(!Auth::user()->getFollowerById( Auth::user()->id , $user->id, 0) && !Auth::user()->getFollowerById(Auth::user()->id , $user->id, 1))
                                                <div class="flex">
                                                    <form id="accept-follow-form" action="{{ route('follower.send.request', $user->id) }}" method="POST" >
                                                        @csrf
                                                        @method('PUT')
                                                        <button type="submit" class=" group-hover:visible text-white bg-gradient-to-r from-green-400 via-green-500 to-green-600 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-green-300 dark:focus:ring-green-800 shadow-lg shadow-green-500/50 dark:shadow-lg dark:shadow-green-800/80 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2">Send Request</button>
                                                    </form>
                                                </div>
                                            @else
                                            <div class="flex">
                                                <form id="accept-follow-form" action="{{ route('follower.cancel.request', $user->id) }}" method="POST" >
                                                    @csrf
                                                    @method('PUT')
                                                    <button type="submit" class=" group-hover:visible text-white bg-gradient-to-r from-red-400 via-red-500 to-red-600 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 shadow-lg shadow-red-500/50 dark:shadow-lg dark:shadow-red-800/80 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2">@if(Auth::user()->getFollowerById($user->id, 1)) Unfollow @else Cancel Request @endif</button>
                                                </form>
                                            </div>
                                        @endif
                                    </p>
                                </td>
                            @endif
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
