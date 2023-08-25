<x-app-layout>
    <div class="bg-gray-950 p-7 min-h-screen">
        <br>
        <div  class="container  mx-auto p-6  bg-gray-900 rounded-3xl ">
            <!-- En-tête -->
            <h1 class="text-white font-jetBrains text-4xl ml-[250px]">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-speedometer" viewBox="0 0 16 16">
                    <!-- ... (votre icône) ... -->
                </svg> Détail du projet "{{ $project->name }}""
            </h1>
            <hr class="bg-gray-950 mt-3 text-4xl">
            <br>
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
            <!-- Contenu de la page -->
            <h1 class="col-span-full font-jetBrains mb-4 text-white text-xl ml-[250px]" >
                Ajouter une nouvelle tâche au projet "{{ $project->name }}"
            </h1>
            <div class="bg-gray-700 rounded-lg shadow-lg p-6 max-w-screen-md m-auto">
                <form action="{{ route('projects.tasks.add', ['project' => $project->id]) }}" method="post">
                    @csrf
                    <div class="flex items-center space-x-4">
                        <input type="text" name="task_name" placeholder="Nouvelle tâche" required class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring focus:border-green-300">
                        <button type="submit"  class=" focus:outline-none text-white bg-green-600 hover:bg-green-600 focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800">
                             Ajouter
                        </button>
                    </div>
                </form>
            </div><br>

            <h1 class="text-3xl font-jetBrains text-white ml-[250px] ">
                Liste de tâches
            </h1><br>
            <div class="bg-gray-700 rounded-lg shadow-lg mt-6 p-6 max-w-screen-md m-auto">
                
                <ul class="list-none p-0">
                    @foreach($allTasks as $task)
                        <li class="mb-2 pb-4 border-b border-gray-220 ">
                            <div class="flex items-center justify-between rounded-lg shadow-md p-6 m-2 bg-gray-800">
                                
                                <div>
                                    <span class="badge @if($project->completed)  badge-success @else badge-warning @endif mt-2 text-gray-700 mb-2"  >
                                        @if($task->completed)
                                            Terminé
                                        @else
                                            En cours
                                        @endif
                                    </span>
                                    <x-dropdown  >
                                        <x-slot name="trigger">
                                            <button class=" flex ml-[600px] mt-[-20px] rotate-90">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-gray-400" viewBox="0 0 20 20" fill="currentColor">
                                                    <path d="M6 10a2 2 0 11-4 0 2 2 0 014 0zM12 10a2 2 0 11-4 0 2 2 0 014 0zM16 12a2 2 0 100-4 2 2 0 000 4z" />
                                                </svg>
                                            </button>
                                        </x-slot>
                                        <x-slot name="content" >
                                            <div class= "">
                                                @if(!$project->completed)
                                                    <a href="{{ route('tasks.complete', ['task' => $task, 'project' => $project->id]) }}" class="hover:no-underline e block w-full px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">
                                                        ACCOMPLIR
                                                    </a>
                                                    
                                                    <a  href="{{ route('tasks.edit', ['task' => $task, 'project' => $project->id]) }} " class=" hover:no-underline  block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white" >
                                                        MODIFIER
                                                    </a>
            
                                                @endif 
                                                <a href="{{route('tasks.delete', ['task' => $task, 'project' => $project->id])  }}" class="hover:no-underline e block w-full px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">
                                                    DELETE
                                                </a>
                                            </div>
                                        </x-slot>
                                    </x-dropdown>
                                    <strong class="text-white font-jetBrains mb-6">{{ $task->name }}</strong>
                                    <p class="text-white text-sm">Date de création : {{ $task->created_at }}</p>
                                    <p class="text-white text-sm">Propriétaire : {{ $task->user->name }}</p>
                                </div>
                            </div>
                        </li>
                    @endforeach
                </ul>

                <h2  class="text-2xl font-jetBrains text-white" >Tâches assignées aux membres du projet :</h2>
                <ul style="list-style-type: none; padding-left: 0; margin-top: 20px;">
                    @foreach($project->users as $user)
                        <li style="border: 1px solid #ccc; border-radius: 5px; padding: 10px; margin-bottom: 10px; background-color: #f8f8f8;">
                            <div style="display: flex; justify-content: space-between; align-items: center;">
                                <strong style="font-size: 20px;">{{ $user->name }}</strong>
                                <a href="{{ route('projects.users.unassign', ['project' => $project, 'user' => $user]) }}" class="badge badge-del text-white" style="font-size: 16px;  text-decoration: none; margin-left: 10px;">
                                    Retirer du projet
                                </a>
                            </div>
                            <ul style="list-style-type: none; padding-left: 0; margin-top: 10px;">
                                @foreach($user->tasksInProject($project) as $task)
                                    <li style="border: 1px solid #ccc; border-radius: 5px; padding: 10px; margin-bottom: 5px; background-color: #ffffff;">
                                        <div style="display: flex; justify-content: space-between; align-items: center;">
                                            <span style="font-size: 18px;">{{ $task->name }}</span>
                                            <a href="{{ route('projects.tasks.users.unassign', ['project' => $project, 'task' => $task, 'user' => $user]) }}" class="badge badge-del" style="font-size: 16px; text-decoration: none;">
                                                Retirer la tâche
                                            </a>
                                        </div>
                                    </li>
                                @endforeach
                            </ul>
                        </li>
                    @endforeach
                </ul>

            </div>
        </div>
    </div>
    <style>
            
            .badge-success {
                background-color: #4cff4c;
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
