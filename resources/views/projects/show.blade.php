<x-app-layout>
    <div class="container mx-auto py-8">
        <div class="bg-white rounded-lg shadow-lg p-6" style="max-width: 800px;margin: 0 auto; ">
            <h1 class="text-2xl font-semibold mb-6">Ajouter une nouvelle tâche</h1>
            <form action="{{ route('projects.tasks.add', ['project' => $project->id]) }}" method="post">
                @csrf
                <div class="flex items-center space-x-4">
                    <input type="text" name="task_name" placeholder="Nouvelle tâche" required class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring focus:border-blue-300">
                    <button type="submit" style="color: white; background-color:green" class="px-1py-2   rounded-lg ">
                        <i class="fa fa-plus fa-lg"></i> Ajouter
                    </button>
                </div>
            </form>
        </div>
            <br><br>
        <div class="bg-white rounded-lg shadow-lg mt-6 p-6 " style="max-width: 800px;margin: 0 auto; ">
            <h1 class="text-2xl font-semibold mb-6">Liste de tâches</h1>
            <ul class="list-none p-0">
                @foreach($project->tasks as $task)
                    <li class="mb-4 pb-4 border-b border-gray-200">
                        <div class="flex items-center justify-between">
                            <div>
                                <strong class="text-lg font-semibold">{{ $task->name }}</strong>
                                <p class="text-gray-500 text-sm">Date de création : {{ $task->created_at }}</p>
                                <p class="text-gray-500 text-sm">Propriétaire : {{ $task->user->name }}</p>
                            </div>
                            <div class="flex items-center space-x-4">
                                @if($task->completed)
                                    <span class="text-black rounded-lg font-semibold text-sm"type="submit" style="color: white; background-color:green">Terminé</span>
                                @else
                                    <form action="{{ route('tasks.complete', ['task' => $task, 'project' => $project->id]) }}" method="post">
                                        @csrf
                                        @method('PUT')
                                        <button type="submit" class=" rounded-lg p-2 hover:bg-green-600 " style="color: white; background-color:green">
                                            <i class="fa fa-check fa-lg"></i>
                                        </button>
                                    </form>
                                    <a href="{{ route('tasks.edit', ['task' => $task, 'project' => $project->id]) }}" style="color: white; background-color:blue" class="text-blue-500 rounded-lg text-sm">Modifier</a>
                                @endif
                                <form action="{{ route('tasks.delete', ['task' => $task, 'project' => $project->id]) }}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class=" rounded-lg  p-2 hover:bg-red-600 " style="color: white; background-color:red">
                                        <i class="fa fa-trash fa-lg"></i>
                                    </button>
                                </form>
                            </div>
                        </div>
                    </li>
                @endforeach
            </ul>
        </div>
    </div>
</x-app-layout>
