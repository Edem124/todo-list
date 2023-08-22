<x-app-layout>
    <div style="display: flex; gap: 20px;">
        <div style="flex: 1; padding: 20px; background-color: #f4f4f4; border-radius: 10px;">
            <h2>Ajouter un nouveau projet</h2>
            <form action="{{ route('projects.store') }}" method="post">
                @csrf
                <input type="text" name="project_name" placeholder="Nouveau projet" required style="width: 80%; padding: 8px; border: 1px solid #ccc; border-radius: 5px;">
                <button type="submit" style="padding: 8px 15px; background-color: #4CAF50; color: white; border: none; border-radius: 5px;">Ajouter</button>
            </form>
        </div>
        <div style="flex: 2; padding: 20px; background-color: #fff; border-radius: 10px; box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);">
            <h1 style="text-decoration: underline;">Liste de projets</h1>
            <ul style="list-style: none; padding: 0;">
                @foreach($ownedProjects as $project)
                    <li style="margin-bottom: 20px; border-bottom: 1px solid #eee; padding-bottom: 10px;">
                        <a href="{{ route('projects.show', $project) }}">
                            <strong>Nom :</strong> 
                                <span @if($project->completed) style="text-decoration: line-through; color: #888;" @endif>
                                    {{ $project->name }}
                                </span><br>
                            </strong>
                        </a>
                        <strong>Date de création :</strong> {{ $project->created_at }}<br>
                        <strong>Propriétaire :</strong> {{ $project->user->name }}<br>
                        
                        @if($project->completed)
                            <strong>Date de fin :</strong> {{ $project->deadline }}<br>
                        @else
                            <form action="{{ route('projects.complete', $project) }}" method="post" style="display: inline;">
                                @csrf
                                @method('PUT')
                                <button type="submit" style="background-color: #4CAF50; color: white; border: none; border-radius: 3px; padding: 5px 10px;">Marquer comme accompli</button>
                            </form>
                            <a href="{{ route('projects.edit', $project) }}" style="color: #3498db; margin-left: 10px;">Modifier</a>
                        @endif
                        
                        <form action="{{ route('projects.destroy', $project) }}" method="post" style="display: inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" style="background-color: #f44336; color: white; border: none; border-radius: 3px; padding: 5px 10px; margin-left: 10px;">Supprimer</button>
                        </form>
                    </li>
                @endforeach
            </ul>
        </div>
        <div style="flex: 2; padding: 20px; background-color: #fff; border-radius: 10px; box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);">
            <h1 style="text-decoration: underline;">Liste de projets aux quelles vous êtes ajoutés</h1>
            <ul style="list-style: none; padding: 0;">
                @foreach($sharedProjects as $project)
                    <li style="margin-bottom: 20px; border-bottom: 1px solid #eee; padding-bottom: 10px;">
                        <a href="{{ route('projects.showt', $project) }}">
                                <strong>Nom :</strong> 
                                    <span @if($project->completed) style="text-decoration: line-through; color: #888;" @endif>
                                        {{ $project->name }}
                                    </span><br>
                                </strong>
                        </a>    
                        
                        <strong>Date de création :</strong> {{ $project->created_at }}<br>
                        <strong>Propriétaire :</strong> {{ $project->user->name }}<br>
                        
                        @if($project->completed)
                            <strong>Date de fin :</strong> {{ $project->deadline }}<br>
                        @else
                            <form action="{{ route('projects.complete', $project) }}" method="post" style="display: inline;">
                                @csrf
                                @method('PUT')
                                <button type="submit" style="background-color: #4CAF50; color: white; border: none; border-radius: 3px; padding: 5px 10px;">Marquer comme accompli</button>
                            </form>
                        @endif
                        
                        
                    </li>
                @endforeach
            </ul>
        </div>


        
</x-app-layout>       