<x-app-layout>
    <div style="background-color:black;padding: 30px; min-height: 100vh;">   
        <br>
        <div class="container mx-auto p-6" style="background-color: #333333; border-radius: 30px;">
            <!-- En-tête -->
            <h1 style="font-size:40px; font-family:Constantia; color:#ffffff ">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-speedometer" viewBox="0 0 16 16">
                <!-- ... (votre icône) ... -->
                </svg> Détail
            </h1>
            <hr style="background-color:black "><br> 

            <!-- Contenu de la page -->
            <h1 style="font-size: 28px; margin-bottom: 20px; color: #fff;">Liste des tâches du projet "{{ $project->name }}"</h1>
            <ul style="list-style: none; padding: 0;">
                @foreach($tasks as $task)
                    <li style="margin-bottom: 20px; border-bottom: 1px solid #ddd; padding-bottom: 10px;">
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
                                        <button type="submit" class="btn  btn-icon" style="background-color:green;font-size: 16px;">
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
        /* ... (vos styles personnalisés) ... */
    </style>
</x-app-layout>
