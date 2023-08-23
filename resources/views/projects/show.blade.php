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
            <h1 class="col-span-full font-semibold mb-4" style="color: white; background-color: #333333; font-size: 20px;">
                Ajouter une nouvelle tâche au projet "{{ $project->name }}"
            </h1>
            <div class="bg-white rounded-lg shadow-lg p-6" style="max-width: 800px; margin: 0 auto;">
                <form action="{{ route('projects.tasks.add', ['project' => $project->id]) }}" method="post">
                    @csrf
                    <div class="flex items-center space-x-4">
                        <input type="text" name="task_name" placeholder="Nouvelle tâche" required class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring focus:border-blue-300">
                        <button type="submit" style="color: white; background-color:green" class="px-1 py-2 rounded-lg">
                            <i class="fa fa-plus fa-lg"></i> Ajouter
                        </button>
                    </div>
                </form>
            </div>

            <br><br>

            <h1 class="col-span-full font-semibold mb-4" style="color: white; background-color: #333333; font-size: 20px;">
                Liste de tâches
            </h1>
            <div class="bg-white rounded-lg shadow-lg mt-6 p-6" style="max-width: 800px; margin: 0 auto;">
                <ul class="list-none p-0">
                    @foreach($allTasks as $task)
                        <li class="mb-4 pb-4 border-b border-gray-200">
                            <div class="flex items-center justify-between">
                                <div>
                                    <strong class="text-lg font-semibold">{{ $task->name }}</strong>
                                    <p class="text-gray-500 text-sm">Date de création : {{ $task->created_at }}</p>
                                    <p class="text-gray-500 text-sm">Propriétaire : {{ $task->user->name }}</p>
                                </div>
                                <div class="flex items-center space-x-4">
                                    @if($task->completed)
                                        <span class="text-black rounded-lg font-semibold text-sm" type="submit" style="color: white; background-color:green">Terminé</span>
                                    @else
                                        <form action="{{ route('tasks.complete', ['task' => $task, 'project' => $project->id]) }}" method="post">
                                            @csrf
                                            @method('PUT')
                                            <button type="submit" class="rounded-lg p-2 hover:bg-green-600" style="color: white; background-color:green">
                                                <i class="fa fa-check fa-lg"></i>
                                            </button>
                                        </form>
                                        <a href="{{ route('tasks.edit', ['task' => $task, 'project' => $project->id]) }}" style="color: white; background-color:blue" class="text-blue-500 rounded-lg text-sm">Modifier</a>
                                    @endif
                                    <form action="{{ route('tasks.delete', ['task' => $task, 'project' => $project->id]) }}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="rounded-lg p-2 hover:bg-red-600" style="color: white; background-color:red">
                                            <i class="fa fa-trash fa-lg"></i>
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </li>
                    @endforeach
                </ul>

                <h2 style="font-size: 40px; margin-top: 40px; font-family: Sitka;">Tâches assignées aux membres du projet :</h2>
                <ul>
                    @foreach($project->users as $user)
                        <li>
                            <strong>{{ $user->name }}</strong><a href="{{ route('projects.users.unassign', ['project' => $project, 'user' => $user]) }}" style="color: black; font-size: 20px; font-family: Sitka;">Retirer du projet</a>
                            <ul>
                                @foreach($user->tasksInProject($project) as $task)
                                    <li>{{ $task->name }} <a href="{{ route('projects.tasks.users.unassign', ['project' => $project, 'task' => $task, 'user' => $user]) }}" style="color: black; font-size: 20px; font-family: Sitka;">Retirer la tâche</a></li>
                                @endforeach
                            </ul>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
</x-app-layout>
