<x-app-layout>
    <div style="background-color: #f8f9fa; padding: 30px; min-height: 100vh;">
        <div style="max-width: 600px; margin: 0 auto; background-color: #fff; border-radius: 10px; box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);">
            <div style="padding: 30px;">
                <h1 style="font-size: 28px; margin-bottom: 20px; color: #333;">Liste des tâches du projet "{{ $project->name }}"</h1>
                <ul style="list-style: none; padding: 0;">
                    @foreach($tasks as $task)
                        <li style="margin-bottom: 20px; border-bottom: 1px solid #ddd; padding-bottom: 10px;">
                            <div style="display: flex; align-items: center; justify-content: space-between;">
                                <div style="flex-grow: 1;">
                                    <strong style="font-weight: bold; font-size: 18px; margin-right: 10px; color: #333;">Nom :</strong> 
                                    <span @if($task->completed) style="text-decoration: line-through; color: #888;" @endif>
                                        {{ $task->name }}
                                    </span><br>
                                    <strong style="font-weight: bold; font-size: 16px; color: #666;">Date de création :</strong> {{ $task->created_at }}<br>
                                    <strong style="font-weight: bold; font-size: 16px; color: #666;">Propriétaire :</strong> {{ $task->user->name }}<br>
                                </div>
                                @if($task->completed)
                                    <strong style="font-weight: bold; font-size: 16px; color: #666;">Date de fin :</strong> {{ $task->deadline }}<br>
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
    </div>
</x-app-layout>
