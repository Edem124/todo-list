<x-app-layout>
    <div style="display: flex; gap: 20px;">
        <div style="flex: 1; padding: 20px; background-color: #f4f4f4; border-radius: 10px;">
            <h2>Ajouter une nouvelle tâche</h2>
            <form action="{{ route('tasks.add') }}" method="post">
                @csrf
                <input type="text" name="task_name" placeholder="Nouvelle tâche" required style="width: 80%; padding: 8px; border: 1px solid #ccc; border-radius: 5px;">
                <button type="submit" style="padding: 8px 15px; background-color: #4CAF50; color: white; border: none; border-radius: 5px;">Ajouter</button>
            </form>
        </div>
        
        <div style="flex: 2; padding: 20px; background-color: #fff; border-radius: 10px; box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);">
            <h1 style="text-decoration: underline;">Liste de tâches</h1>
            <ul style="list-style: none; padding: 0;">
                @foreach($userTasks as $task)
                    <li style="margin-bottom: 20px; border-bottom: 1px solid #eee; padding-bottom: 10px;">
                        <strong>Nom :</strong> 
                        <span @if($task->completed) style="text-decoration: line-through; color: #888;" @endif>
                            {{ $task->name }}
                        </span><br>
                        
                        <strong>Date de création :</strong> {{ $task->created_at }}<br>
                        <strong>Propriétaire :</strong> {{ $task->user->name }}<br>
                        
                        @if($task->completed)
                            <strong>Date de fin :</strong> {{ $task->deadline }}<br>
                        @else
                            <form action="{{ route('tasks.complete', $task) }}" method="post" style="display: inline;">
                                @csrf
                                @method('PUT')
                                <button type="submit" style="background-color: #4CAF50; color: white; border: none; border-radius: 3px; padding: 5px 10px;">Marquer comme accompli</button>
                            </form>
                            <a href="{{ route('tasks.edit', $task) }}" style="color: #3498db; margin-left: 10px;">Modifier</a>
                        @endif
                        
                        <form action="{{ route('tasks.delete', $task) }}" method="post" style="display: inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" style="background-color: #f44336; color: white; border: none; border-radius: 3px; padding: 5px 10px; margin-left: 10px;">Supprimer</button>
                        </form>
                    </li>
                @endforeach
            </ul>
        </div>
        <div style="flex: 2; padding: 20px; background-color: #fff; border-radius: 10px; box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);">
            <h1 style="text-decoration: underline;">Liste de tâches aux quelles ont vous a ajouté</h1>
            <ul style="list-style: none; padding: 0;">
                @foreach($sharedTasks as $task)
                    <li style="margin-bottom: 20px; border-bottom: 1px solid #eee; padding-bottom: 10px;">
                        <strong>Nom :</strong> 
                        <span @if($task->completed) style="text-decoration: line-through; color: #888;" @endif>
                            {{ $task->name }}
                        </span><br>
                        
                        <strong>Date de création :</strong> {{ $task->created_at }}<br>
                        <strong>Propriétaire :</strong> {{ $task->user->name }}<br>
                        
                        @if($task->completed)
                            <strong>Date de fin :</strong> {{ $task->deadline }}<br>
                        @else
                            <form action="{{ route('tasks.complete', $task) }}" method="post" style="display: inline;">
                                @csrf
                                @method('PUT')
                                <button type="submit" style="background-color: #4CAF50; color: white; border: none; border-radius: 3px; padding: 5px 10px;">Marquer comme accompli</button>
                            </form>
                            <a href="{{ route('tasks.edit', $task) }}" style="color: #3498db; margin-left: 10px;">Modifier</a>
                        @endif
                        
                        <form action="{{ route('tasks.delete', $task) }}" method="post" style="display: inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" style="background-color: #f44336; color: white; border: none; border-radius: 3px; padding: 5px 10px; margin-left: 10px;">Supprimer</button>
                        </form>
                    </li>
                @endforeach
            </ul>
        </div>
    </div>
    
    
</x-app-layout>
