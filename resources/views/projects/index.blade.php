<x-app-layout>
    <div  class="bg-gray-950 p-7 min-h-screen">   
        <br>
        <div class="container mx-auto p-6 bg-gray-900 rounded-3xl" >
            
                <h1 class="text-white font-jetBrains text-4xl ">
                 Dashboard
                </h1><hr style="background-color:black "><br> 
            
            <h1 class="col-span-full font-jetBrains mb-4 text-white text-xl" >Liste de vos projets</h1>
            @if (session('success'))
                <div id="alert-1" class="flex items-center p-4 mb-4 text-blue-800 rounded-lg bg-blue-50 dark:bg-gray-800 dark:text-blue-400" role="alert">
                    <svg class="flex-shrink-0 w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                    <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z"/>
                    </svg>
                    <span class="sr-only">Info</span>
                    <div class="ml-3 text-sm font-medium">
                        {{session('success')}} 
                    </div>
                    <button type="button" class="ml-auto -mx-1.5 -my-1.5 bg-blue-50 text-blue-500 rounded-lg focus:ring-2 focus:ring-blue-400 p-1.5 hover:bg-blue-200 inline-flex items-center justify-center h-8 w-8 dark:bg-gray-800 dark:text-blue-400 dark:hover:bg-gray-700" data-dismiss-target="#alert-1" aria-label="Close">
                        <span class="sr-only">Close</span>
                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                        </svg>
                    </button>
                </div>
            @elseif (session('danger'))
                <div id="alert-2" class="flex items-center p-4 mb-4 text-red-800 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400" role="alert">
                    <svg class="flex-shrink-0 w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                    <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z"/>
                    </svg>
                    <span class="sr-only">Info</span>
                    <div class="ml-3 text-sm font-medium">
                        {{session('danger')}}
                    </div>
                    <button type="button" class="ml-auto -mx-1.5 -my-1.5 bg-red-50 text-red-500 rounded-lg focus:ring-2 focus:ring-red-400 p-1.5 hover:bg-red-200 inline-flex items-center justify-center h-8 w-8 dark:bg-gray-800 dark:text-red-400 dark:hover:bg-gray-700" data-dismiss-target="#alert-2" aria-label="Close">
                    <span class="sr-only">Close</span>
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                    </svg>
                    </button>
                </div>
            @elseif (session('warning'))
                    
                <div id="alert-4" class="flex items-center p-4 mb-4 text-yellow-800 rounded-lg bg-yellow-50 dark:bg-gray-800 dark:text-yellow-300" role="alert">
                    <svg class="flex-shrink-0 w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                    <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z"/>
                    </svg>
                    <span class="sr-only">Info</span>
                    <div class="ml-3 text-sm font-medium">
                        {{session('warning')}}
                    </div>
                    <button type="button" class="ml-auto -mx-1.5 -my-1.5 bg-yellow-50 text-yellow-500 rounded-lg focus:ring-2 focus:ring-yellow-400 p-1.5 hover:bg-yellow-200 inline-flex items-center justify-center h-8 w-8 dark:bg-gray-800 dark:text-yellow-300 dark:hover:bg-gray-700" data-dismiss-target="#alert-4" aria-label="Close">
                    <span class="sr-only">Close</span>
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                    </svg>
                    </button>
                </div>
            @endif
            
            <div class="mt-6 grid gap-6 grid-cols-1 md:grid-cols-2 lg:grid-cols-3">
                
                @foreach($ownedProjects as $project)
                    <div class="rounded-lg shadow-md p-6 m-2 bg-gray-800">
                        <!-- Badge d'état -->
                        <span class="badge @if($project->completed) badge-success @else badge-warning @endif mt-2 text-gray-700" >
                            @if($project->completed)
                                Terminé
                            @else
                                En cours
                            @endif
                        </span>
                        <x-dropdown class="py-2 text-sm text-gray-700 dark:text-gray-900" >
                            <x-slot name="trigger" >
                                <button class=" flex ml-[310px] mt-[-20px] rotate-90">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-gray-100" viewBox="0 0 20 20" fill="currentColor">
                                        <path d="M6 10a2 2 0 11-4 0 2 2 0 014 0zM12 10a2 2 0 11-4 0 2 2 0 014 0zM16 12a2 2 0 100-4 2 2 0 000 4z" />
                                    </svg>
                                </button>
                            </x-slot>
                            <x-slot name="content">
                                    @if(!$project->completed)
                                        <a href="{{ route('projects.complete', $project) }}" class="hover:no-underline e block w-full px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">
                                            Accomplir
                                        </a>
                                        
                                        <a  href="{{ route('projects.edit', $project) }} "class=" hover:no-underline  block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white" >
                                            Modifier
                                        </a>

                                    @endif 
                                    <a  href="{{ route('projects.destroy', $project) }} "class="block hover:no-underline px-4 py-2 hover:bg-gray-100 "  >
                                        Delete
                                    </a>
                                
                            </x-slot>
                        </x-dropdown>
                        <a href="{{ route('projects.show', $project) }}" class="block text-xl hover:no-underline text-white font-jetBrains mb-2 ">{{ $project->name }}</a>
                        <hr class="bg-gray-600 my-3">
                        <p class="text-white">Date de création : {{ $project->created_at }}</p>
                        <p class="text-white">Propriétaire : {{ $project->user->name }}</p>
                    </div>
                @endforeach
            </div><br>
                <h1 class="col-span-full text-white text-xl font-jetBrains mb-4">Liste des projets qu'on vous a assignés</h1>
            <div class="mt-6 grid gap-6 grid-cols-1 md:grid-cols-2 lg:grid-cols-3 ">
                
                @foreach($sharedProjects as $project)
                    <div class=" rounded-lg shadow-md p-6 m-2 bg-gray-800" >
                        <!-- Badge d'état -->
                        <span class="badge @if($project->completed) badge-success @else badge-warning @endif mt-2 text-gray-700">
                            @if($project->completed)
                                Terminé
                            @else
                                En cours
                            @endif
                        </span><br>
                        <x-dropdown >
                            <x-slot name="trigger">
                                <button class=" flex ml-[310px] mt-[-20px] rotate-90">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-gray-400" viewBox="0 0 20 20" fill="currentColor">
                                        <path d="M6 10a2 2 0 11-4 0 2 2 0 014 0zM12 10a2 2 0 11-4 0 2 2 0 014 0zM16 12a2 2 0 100-4 2 2 0 000 4z" />
                                    </svg>
                                </button>
                            </x-slot>
                            <x-slot name="content">
                                @if(!$project->completed)
                                    <form action="{{ route('projects.complete', $project) }}" method="post" class="inline-block ml-2 mr-2 mt-2">
                                        @csrf
                                        @method('PUT')
                                        <button type="submit" class="badge badge-ter"  >
                                            Accomplir
                                        </button>
                                    </form>
                                @endif
                                
                            </x-slot>
                        </x-dropdown>
                        <a href="{{ route('projects.showt', $project) }}" class="text-white text-xl font-jetBrains mb-2 hover:underline">{{ $project->name }}</a>
                        <hr class="bg-gray-600 my-3">
                        <p class="text-white">Date de création : {{ $project->created_at }}</p>
                        <p class="text-white">Propriétaire : {{ $project->user->name }}</p>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
        <style>
            
            .badge-success {
                background-color: #99ff99;
            }
            .badge-warning {
                background-color: #ffff7f;
            }
            .badge-ter {
                background-color: #9fcbfe;
            }
            .badge-del {
                background-color: #ff7e70;
            }
        </style>

</x-app-layout>
