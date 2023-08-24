<x-app-layout>
    <div style="background-color: black; min-height: 100vh;">
        <br>
        <div class="container mx-auto p-6" style="background-color: #333333; border-radius: 30px;">
            <!-- En-tête -->
            <h1 style="font-size: 40px; font-family: Constantia; color: #ffffff ">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-speedometer" viewBox="0 0 16 16">
                    <!-- ... (votre icône) ... -->
                </svg> Détail
            </h1>
            <hr style="background-color: black;">
            <br>

            <!-- Contenu de la page -->
            <h1 class="col-span-full font-jetBrains mb-4" style="color: white; background-color: #333333; font-size: 20px;">
                Ajouter une nouvelle tâche au projet "{{ $project->name }}"
            </h1>
            <div class="bg-#4c4c4c rounded-lg shadow-lg p-6" style="max-width: 800px; margin: 0 auto;">
                <form action="{{ route('projects.tasks.add', ['project' => $project->id]) }}" method="post">
                    @csrf
                    <div class="flex items-center space-x-4">
                        <input type="text" name="task_name" placeholder="Nouvelle tâche" required class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring focus:border-blue-300">
                        <button type="submit"  class=" badge-success  rounded-lg">
                            <i class="fa fa-plus fa-lg"></i> Ajouter
                        </button>
                    </div>
                </form>
            </div>

            <br><br>

            <h1 class="col-span-full  mb-4" style="color: white; background-color: #333333; font-size: 20px;font-family: jetBrains Mono; ">
                Liste de tâches
            </h1>
            <div class="bg-#4c4c4c rounded-lg shadow-lg mt-6 p-6" style="max-width: 800px; margin: 0 auto;">
                <ul class="list-none p-0">
                    @foreach($allTasks as $task)
                        <li class="mb-4 pb-4 border-b border-gray-200">
                            <div class="flex items-center justify-between">
                                <div>
                                    <strong class="text-white font-jetBrains">NOM:{{ $task->name }}</strong>
                                    <p class="text-white text-sm">Date de création : {{ $task->created_at }}</p>
                                    <p class="text-white text-sm">Propriétaire : {{ $task->user->name }}</p>
                                </div>
                                <div class="flex items-center space-x-4">
                                    @if($task->completed)
                                        <span class="text-black rounded-lg font-jetBrains text-sm badge-ter ml-2" type="submit" >Terminé</span>
                                    @else
                                        <form action="{{ route('tasks.complete', ['task' => $task, 'project' => $project->id]) }}" method="post">
                                            @csrf
                                            @method('PUT')
                                            <button type="submit" class="rounded-lg p-2 badge badge-warning ml-2" >
                                                Accomplir
                                            </button>
                                        </form>
                                        <a href="{{ route('tasks.edit', ['task' => $task, 'project' => $project->id]) }}"  class="ml-2 badge badge-success rounded-lg text-sm">Modifier</a>
                                    @endif
                                    <form action="{{ route('tasks.delete', ['task' => $task, 'project' => $project->id]) }}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="rounded-lg p-2 badge badge-del ml-2" >
                                            DELETE
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </li>
                    @endforeach
                </ul>

                <h2 style="font-size: 30px; margin-top: 40px; font-family: jetBrains Mono;color:white;">Tâches assignées aux membres du projet :</h2>
                <ul style="list-style-type: none; padding-left: 0; margin-top: 20px;">
                    @foreach($project->users as $user)
                        <li style="border: 1px solid #ccc; border-radius: 5px; padding: 10px; margin-bottom: 10px; background-color: #f8f8f8;">
                            <div style="display: flex; justify-content: space-between; align-items: center;">
                                <strong style="font-size: 20px;">{{ $user->name }}</strong>
                                <a href="{{ route('projects.users.unassign', ['project' => $project, 'user' => $user]) }}" class="badge badge-del" style="font-size: 16px;  text-decoration: none; margin-left: 10px;">
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
