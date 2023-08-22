<x-app-layout>
    <div style="display: flex; gap: 20px;">
        <div style="flex: 2; padding: 20px; background-color: #f5f5f5; border-radius: 10px; box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);">
            <h1 style="text-decoration: underline; font-size: 24px; margin-bottom: 20px; color: #333;">Liste des tâches du projet "{{ $project->name }}"</h1>
            <ul style="list-style: none; padding: 0;">
                @foreach($tasks as $task)
                    <li style="margin-bottom: 20px; border-bottom: 1px solid #eee; padding-bottom: 10px;">
                        <strong style="font-weight: bold; font-size: 18px; margin-right: 10px;">Nom :</strong> 
                        <span @if($task->completed) style="text-decoration: line-through; color: #888;" @endif>
                            {{ $task->name }}
                        </span><br>
                        
                        <strong style="font-weight: bold; font-size: 16px;">Date de création :</strong> {{ $task->created_at }}<br>
                        <strong style="font-weight: bold; font-size: 16px;">Propriétaire :</strong> {{ $task->user->name }}<br>
                        
                        @if($task->completed)
                            <strong style="font-weight: bold; font-size: 16px;">Date de fin :</strong> {{ $task->deadline }}<br>
                        @else
                            @if($task->users->contains(Auth::user())) <!-- Vérifiez si l'utilisateur est assigné à cette tâche -->
                                <form action="{{ route('tasks.complete', ['task' => $task, 'project' => $project]) }}" method="post" style="display: inline;">
                                    @csrf
                                    @method('PUT')
                                    <button type="submit" style="background-color: #4CAF50; color: white; border: none; border-radius: 3px; padding: 5px 10px; font-size: 14px; cursor: pointer;">Marquer comme accompli</button>
                                </form>
                            @endif
                        @endif
                        
                    </li>
                @endforeach
            </ul>
        </div>
    </div>
</x-app-layout>
