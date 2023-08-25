<x-app-layout>
    <div class="bg-gray-950 p-7 min-h-screen">   
        <br>
        <div class="container mx-auto p-6  bg-gray-900 rounded-3xl max-w-xl">
            <!-- En-tête -->
            <h1 class="text-white font-jetBrains text-4xl">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-speedometer" viewBox="0 0 16 16">
                <!-- ... (votre icône) ... -->
                </svg> Détail
            </h1>
            <hr class="bg-gray-950 mt-3" ><br> 

            <!-- Contenu de la page -->
            <h1 class="text-2xl mb-5 text-white">Liste des tâches du projet "{{ $project->name }}"</h1>
            <ul class="p-0 list-none">
                @foreach($tasks as $task)
                    <li style="margin-bottom: 10px; border-bottom: 1px solid #ddd; padding-bottom: 5px;">
                        <div style="display: flex; align-items: center; justify-content: space-between;">
                            <div style="flex-grow: 1;">
                                <strong style="font-weight: bold; font-size: 18px; margin-right: 10px; color: #ffffff;">Nom :<span @if($task->completed) style="text-decoration: line-through; color: #ffffff;" @endif>
                                    {{ $task->name }}
                                </span></strong> 
                                <br>
                                <strong style="font-weight: bold; font-size: 16px; color: #ffffff;">Date de création : {{ $task->created_at }}</strong> <br>
                                <strong style="font-weight: bold; font-size: 16px; color: #ffffff;">Propriétaire :{{ $task->user->name }}</strong> <br>
                            </div>
                            @if($task->completed)
                                <strong style="font-weight: bold; font-size: 16px; color: #ffffff;">Date de fin :</strong style=" font-size: 16px; color: #ffffff;"> {{ $task->deadline }}<br>
                            @else
                                @if($task->users->contains(Auth::user())) <!-- Vérifiez si l'utilisateur est assigné à cette tâche -->
                                    <form action="{{ route('tasks.complete', ['task' => $task, 'project' => $project]) }}" method="post">
                                        @csrf
                                        @method('PUT')
                                        <button type="submit" class="badge badge-ter" style="font-size:20px" >
                                            <i class="fas fa-check"></i> Marquer comme accompli
                                        </button>
                                    </form>
                                @endif
                            @endif
                        </div>
                    </li>
                @endforeach
            </ul>
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
